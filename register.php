<?php 
    require 'config/core.php'; 
    $page = "Enregistrez-vous maintenant et faites-vous des amis, amusez-vous et faites connaissance !";
    if(isset($_SESSION['id'])){
      header("Location: $site/me");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $sitename; ?>: <?php echo $page; ?></title>
    <link rel="shortcut icon" href="<?php echo $site; ?>/assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $site; ?>/assets/css/material.css">
    <link rel="stylesheet" href="<?php echo $site; ?>/assets/css/index.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <link rel="stylesheet" href="<?php echo $site; ?>/assets/css/tipsy.css" tyle="text/css">
    <script type="text/javascript" src="<?php echo $site; ?>/assets/js/jquery.tipsy.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
        $(".dropdown-trigger").dropdown();
        $('select').formSelect();
        $('.slider').slider({
            indicators: false,
            height: 300
        });
    });
    </script>
</head>
<div class="container" style="position:absolute;margin-top:50px; right:-120px;">
<div class="row" >
    <div class="col s12 m4">
      <div style="background: transparent;">
        <div class="card-content black-text">
          <div class="row">
              <div class="logo" style="height: 106px;"></div>
              <?php
    if(isset($_POST['create']) && isset($_POST['RUsername']) && isset($_POST['ROPassword']) && isset($_POST['RTPassword']) && isset($_POST['RMail']) && isset($_POST['gender']))
    {
        $RU = trim($_POST['RUsername']);
        $ROP = $_POST['ROPassword'];
        $RTP = $_POST['RTPassword'];
        $RM = $_POST['RMail'];
        $gender = $_POST['gender'];
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
        if($_POST['Gender'] == 'M') {
            $Look = "sh-290-1408.ch-215-1301.lg-270-1223.hd-180-1.hr-100-40";
        } else {
            $Look = "ch-824-1412.lg-3057-1426.fa-3276-97.hr-836-37.ca-3175-64.sh-3016-1412.hd-600-1";
        }
        mysqli_query($conn, "INSERT INTO users (username,password,mail,gender,credits,pixels,motto,look,account_created,ip_register,pais) VALUES ('$RU', '". md5($ROP) ."', '$RM', '$gender','$register[credits]', '$register[vip_points]', '$register[motto]', '$register[look]', '". time() ."','$ip', '$pais')");
        $sql_newuser = "SELECT * FROM users WHERE username='$RU' AND password='". md5($ROP) ."'";
              $result_newuser = $conn->query($sql_newuser);
              $session = $result_newuser->fetch_array();

              $_SESSION['id'] = $session['id'];
              header("Location: $site/me");
    }
    }
?>
             <form method="POST" style="">
              <input type="text" style="text-align:center;color:#80b5c1;background: #FFF;border-radius: 6px;height: 55px;border:none;box-shadow: inset 0 2px 0px #fff, 6px 6px 0px #4a4e4f;margin-bottom: 10px;font-size: 20px;margin-bottom: 6px;" placeholder="Pseudonyme" name="RUsername">
              <input type="password" style="text-align:center;color:#80b5c1;font-size: 20px;border:none;background: #FFF;border-radius: 6px;height: 55px;box-shadow: inset 0 2px 0px #fff, 6px 6px 0px #4a4e4f;margin-bottom: 6px;" placeholder="Mot de passe" name="ROPassword">
               <input type="password" style="text-align:center;color:#80b5c1;font-size: 20px;border:none;background: #FFF;border-radius: 6px;height: 55px;box-shadow: inset 0 2px 0px #fff, 6px 6px 0px #4a4e4f;margin-bottom: 6px;" placeholder="Repete ton mot de passe" name="RTPassword">
               <input type="text" style="text-align:center;color:#80b5c1;font-size: 20px;border:none;background: #FFF;border-radius: 6px;height: 55px;box-shadow: inset 0 2px 0px #fff, 6px 6px 0px #4a4e4f;margin-bottom: 6px;" placeholder="Adresse email" name="RMail">
               <div style="text-align:center;color:#80b5c1;font-size: 20px;border:none;background: #FFF;border-radius: 6px;height: 55px;box-shadow: inset 0 2px 0px #fff, 6px 6px 0px #4a4e4f;margin-bottom: 6px;">
                <select name="gender"required>
                  <option value="" disabled>Sélectionnez votre genre</option>
                  <option value="M" selected>Homme</option>
                  <option value="F">Femme</option>
                </select/>
              </div>
              <button type="submit" name="create" style="width:100%;color:#fff;font-size: 20px;background: #5ded75;border-radius: 6px;height: 55px;border:none;box-shadow: inset 0 6px 0px rgba(255,255,255,.4), 6px 6px 0px #4a4e4f;padding-left: 10px;padding-right: 10px;text-shadow: 0px -2px rgba(0,0,0,.2);margin-bottom: 6px;">S'inscrire</button>
          </form>
                 <a href="<?php echo $site; ?>"> <button type="submit" style="width:100%;color:#fff;font-size: 20px;background: #79b1be;border-radius: 6px;height: 55px;border:none;box-shadow: inset 0 -6px 0px rgba(0,0,0,.1), 6px 6px 0px #4a4e4f;padding-left: 10px;padding-right: 10px;text-shadow: 0px -2px rgba(0,0,0,.2);">Déjà un compte ?</button></a>
        </div>
        </div>
      </div>
    </div> 
    </div>
  </div>
</div>
