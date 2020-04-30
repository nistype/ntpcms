<?php 
    require 'config/core.php'; 
    $page = "Fais-toi des amis, amuse-toi et fais-toi connaître !";
    if(isset($_SESSION['id'])){
      header("Location: $site/me");
  }
    if(isset($_POST['login'])){
        $username = htmlspecialchars(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
        $password = $_POST['password'];

        if(empty($username) && empty($password)){
          $msg = "<div class='errorreg'>Remplis tous les champs.</div>";
        } else {
            $sql = "SELECT * FROM users WHERE username='$username' AND password='". md5($password) ."' LIMIT 1";
            $result = $conn->query($sql);

            if($result->num_rows > 0){
                foreach ($result as $k) {
                    $_SESSION['id'] = $k['id'];
                    header("Location: $site/me");
                }
            } else {
                $msg = "<div class='errorreg'>Pseudo ou mot de passe incorrect.</div>";
            }
        }
    }
?>
<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $sitename; ?>: <?php echo $page; ?></title>
        <link rel="shortcut icon" href="<?php echo $site; ?>/assets/images/favicon.ico">
	    <link media="all" type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	    <link href="login/css/login.css" rel="stylesheet" type="text/css"/>
	</head>
			<div class="boxlogo">
                			</div>
                				<div class="logox"></div>
	<div class="mainbox">
		<div class="mainbgbox">
			<div class="boxlogin">
			<div class="title">Connexion</div>
			<div class="separator"></div>
			<div id="error-messages-container"> 
			
			</div> 
			<form method="post" autocomplete="off">
			<div class="loginBox-U">
			<input type="text" name="username" id="username" placeholder="Pseudonyme.." />
			</div>
			<div class="loginBox-P">
			<input type="password" name="password" id="password" placeholder="Mot de passe.." />
			</div>
			<div class="loginBox-S">
			<input type="Submit" value="Connexion" name="login" />
			</div>
			</form>
			<a href="/register">
			<div class="noaccount"><b>Pas de compte?</b></div>
			<div class="loginBox-R">
			<input type="submit" value="Inscription" name="Reg" />
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