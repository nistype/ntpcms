<?php 
    require 'config/core.php'; 
    $page = "Enregistrez-vous maintenant et faites-vous des amis, amusez-vous et faites connaissance !";
    if(isset($_SESSION['id'])){
      header("Location: $site/me");
  }
?>
   <?php
    if(isset($_POST['create']) && isset($_POST['RUsername']) && isset($_POST['ROPassword']) && isset($_POST['RTPassword']) && isset($_POST['RMail']))
    {
        $RU = trim($_POST['RUsername']);
        $ROP = $_POST['ROPassword'];
        $RTP = $_POST['RTPassword'];
        $RM = $_POST['RMail'];
        $Fail = false;
        $date_full = time();


        $GetUser = mysqli_query($conn,"SELECT * FROM users WHERE username = '$RU'");
        if(mysqli_num_rows($GetUser) > 0)
        {
            echo '<div class="errorreg">Erreur : L’utilisateur est déjà en service.</div>';
            $Fail = true;
        }
        $GetUser = mysqli_query($conn,"SELECT * FROM users WHERE mail = '$RM'");
        if(mysqli_num_rows($GetUser) > 0)
        {
            echo '<div class="errorreg">Erreur : ce courrier a déjà été enregistré auparavant.</div>';
            $Fail = true;
        }
        $Chekban = mysqli_query($conn,"SELECT * FROM bans WHERE value = '". $ip ."'");
        if(mysqli_num_rows($Chekban) > 0)
        {
            echo '<div class="errorreg">Erreur : vous ne pouvez pas vous enregistrer parce que votre adresse IP est bannie</div>';
            $Fail = true;
        }
        elseif(empty($RU) || empty($ROP) || empty($RTP) || empty($RM))
        {
            echo '<div class="errorreg">Erreur : Tu ne peux pas laisser de place vide.</div>';
            $Fail = true;
        }
        
        elseif($RTP !== $ROP)
        {
            echo '<div class="errorreg">Erreur : les mots de passe ne correspondent pas.</div>';
            $Fail = true;
        }
        if($Fail == false)
        {
        $pattern = '[a-zA-Z0-9]';
if (preg_match($pattern, $RUsername)){
echo '<div class="errorreg">Erreur : n’utilise pas de caractères ou de noms bizarres.</div>';
$fail= true;
}
        mysqli_query($conn, "INSERT INTO users (username,password,mail,credits,pixels,motto,look,account_created,ip_register,pais) VALUES ('$RU', '". md5($ROP) ."', '$RM','$register[credits]', '$register[vip_points]', '$register[motto]', '$register[look]', '". time() ."','$ip', '$pais')");
        $sql_newuser = "SELECT * FROM users WHERE username='$RU' AND password='". md5($ROP) ."'";
              $result_newuser = $conn->query($sql_newuser);
              $session = $result_newuser->fetch_array();

              $_SESSION['id'] = $session['id'];
              header("Location: $site/me");
    }
    }
?>
<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $sitename; ?>: <?php echo $page; ?></title>
        <link rel="shortcut icon" href="<?php echo $site; ?>/assets/images/faviconi.ico">
	    <link media="all" type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	    <link href="login/css/register.css" rel="stylesheet" type="text/css"/>
	    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
	</head>

                				<div class="logox"></div>
	<body>
	<div class="mainbox">
		<div class="mainbgbox">
			<div class="boxlogin">
			<div class="title">Inscription</div>
			<div class="separator"></div>
			<div id="error-messages-container"> 
			
			</div> 
			<form method="post">
			<input type="hidden" name="RUsername" value="" id="refer" placeholder="" maxlength="11"/>
			<div class="loginBox-U">
			<input type="text" name="RUsername" value="" id="username" placeholder="Pseudonyme" maxlength="16" required="" />
			</div>
			<div class="loginBox-P">
			<input type="password" name="ROPassword" id="password" value="" placeholder="Mot de passe" required=""/>
			</div>
			<div class="loginBox-P">
			<input type="password" name="RTPassword" id="" placeholder="Mot de passe" required=""/>
			</div>
			<div class="loginBox-EM">
			<input type="text" name="RMail" value="" placeholder="Adresse Email" required=""/>
			</div>
			<a href="<?php echo $site; ?>/me">
			<div class="loginBox-R">
			<input type="submit" id="next" value="Rejoindre" name="create" />
			</div>
			</a>
			</form>
                 <a href="<?= $site ?>">
			<div class="noaccount"><b>Déjà un compte?</b></div>
                <div class="loginBox-RR">
			<input type="submit" value="Retour connexion" name="Reg" />
			</div>
			</a>
		</div>
	</div>
	</div>
        <br>
        <br>
        <br>
		<?php require 'footer.php'; ?>
	</div>
	</body>
</html>
