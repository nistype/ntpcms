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
<center><div class="container" style="position:absolute; margin-top:100px; right:-120px;">
<div class="row" >
    <div class="col s12 m4">
      <div style="background: transparent;">
        <div class="card-content black-text">
          <div class="row">
          	  <div class="logo" style="height: 106px;"></div>
              <br>
          	  <?php echo $msg;?>
            <form method="POST" style="">
              <input type="text" style="text-align:center;color:#253e44;background: #FFF;border-radius: 6px;height: 55px;border:none;box-shadow: inset 0 2px 0px #fff, 6px 6px 0px #253e44;margin-bottom: 10px;font-size: 20px;margin-bottom: 6px;" placeholder="Pseudonyme" name="username">
              <input type="password" style="text-align:center;color:#253e44;font-size: 20px;border:none;background: #FFF;border-radius: 6px;height: 55px;box-shadow: inset 0 2px 0px #fff, 6px 6px 0px #253e44;margin-bottom: 6px;" placeholder="Mot de passe" name="password">
              <button type="submit" name="login" style="width:100%;color:#fff;font-size: 20px;background: #5ded75;border-radius: 6px;height: 55px;border:none;box-shadow: inset 0 6px 0px rgba(255,255,255,.4), 6px 6px 0px #253e44;padding-left: 10px;padding-right: 10px;text-shadow: 0px -2px rgba(0,0,0,.2);margin-bottom: 6px;">Connexion</button>
          </form>
              <a href="<?php echo $site; ?>/register"><button type="submit" style="width:100%;color:#fff;font-size: 20px;background: #79b1be;border-radius: 6px;height: 55px;border:none;box-shadow: inset 0 -6px 0px rgba(0,0,0,.1), 6px 6px 0px #253e44;padding-left: 10px;padding-right: 10px;text-shadow: 0px -2px rgba(0,0,0,.2);">S'inscrire</button></a>
        </div>
        </div>
      </div>
    </div></center>
    <div class="col s12 m8">
     	<?php
  $noticias = mysqli_query($conn, "SELECT * FROM cms_news ORDER BY id DESC LIMIT 1");
    while ($noticiast = mysqli_fetch_assoc($noticias)) {
                  ?>
     	
     <?php } ?>
     </div>	
    </div>
  </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php require 'footer.php'; ?>