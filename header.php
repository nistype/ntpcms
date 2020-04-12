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
    <link rel="stylesheet" href="<?php echo $site; ?>/assets/css/style.css">
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
<body>
<?php if(isset($_SESSION['id'])){ ?>
<div class="header-top">
    <div class="container">
        <div class="row">
        <div class="col s12 m7">
                <div class="logo"><div class="online_users">
<img src="<?php echo $site;?>/assets/images/online.gif" style="position: relative;top:3px;">
                    <?php
$resultado = mysqli_query($conn,"SELECT * FROM users WHERE online = '1'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
 
?> Habbot's en ligne</div></div>
            </div>
            <div class="col m5" style="margin-top: 75px;">
            <?php if($user['rank'] >= 3){ ?><a href="<?php echo $site; ?>/housekeeping" style="background: #F44336;box-shadow: 0px 0px 5px hsla(0, 0%, 0%, 0.14);border-radius: 4px !important;padding: 0px 20px;width: 49%;font-weight: bold;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;" class="waves-effect waves-light btn-large ocultar">Administration</a><?php } ?>
               <a href="<?php echo $site; ?>/client.php" style="background: #5ab7db;box-shadow: 0px 0px 5px hsla(0, 0%, 0%, 0.14);border-radius: 4px !important;padding: 0px 20px;width: 49%;font-weight: bold;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;" class="waves-effect waves-light btn-large ocultar">Jouer</a>
            </div>
        </div>
    </div>
</div>
<nav>
    <div class="nav-wrapper">
    <div class="container">
      <a href="#!" class="brand-logo sidenav-trigger"><?php echo $user['username']; ?></a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="left hide-on-med-and-down">
        <li><a class="dropdown-trigger" href="#!" style="font-weight: bold;" data-target="dropdown1"><img src="http://habboemotion.com/resources/images/icons/hatboynl9.gif"> <?php echo $user['username']; ?> <i style="margin-top: 15px;margin-left: 1px;" class="material-icons right">keyboard_arrow_down</i></a></li>
        <li><a class="dropdown-trigger" href="#!" style="font-weight: bold;" data-target="dropdown2"><img src="http://habboemotion.com/resources/images/icons/new_20.gif"> Communauté<i style="margin-top: 15px;margin-left: 1px;" class="material-icons right">keyboard_arrow_down</i></a></li>
      <li><a class="dropdown-trigger" href="#!" style="font-weight: bold;" data-target="dropdown3"><img src="http://habboemotion.com/resources/images/icons/cat_10.gif"> Boutique<i style="margin-top: 15px;margin-left: 1px;" class="material-icons right">keyboard_arrow_down</i></a></li>
      <li><a class="dropdown-trigger" href="#!" style="font-weight: bold;" data-target="dropdown4"><img src="http://habboemotion.com/resources/images/icons/forum_2.gif"> Support<i style="margin-top: 15px;margin-left: 1px;" class="material-icons right">keyboard_arrow_down</i></a></li>
        <li><a href="<?php echo $site; ?>/me?action=logout" style="color: #f44336;"><img src="http://habboemotion.com/resources/images/icons/cross.gif"> Déconnexion</a></li>
      </ul>
    </div>
    </div>
  </nav>
  <ul id="dropdown1" class="dropdown-content">
    <li><a href="<?php echo $site;?>"><img src="http://habboemotion.com/resources/images/icons/boyshortyi5.gif"> Me</a></li>
    <li><a href="<?php echo $site; ?>/messages"><img src="http://habboemotion.com/resources/images/icons/icon_envelope.gif"> SMS (<?php
$resultado = mysqli_query($conn,"SELECT * FROM messages_privates WHERE receptor = '".$user['username']."'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas"; 
?>)</a></li>
    <li><a href="<?php echo $site;?>/profil/<?php echo $user['id']; ?>"><img src="http://habboemotion.com/resources/images/icons/v20_1.gif"> Mon Profil</a></li>
    <li><a href="<?php echo $site;?>/options"><img src="http://habboemotion.com/resources/images/icons/group_2.gif"> Paramètres</a></li>
  </ul>
<ul id="dropdown2" class="dropdown-content">
    <li><a href="<?php echo $site;?>/communaute"><img src="http://habboemotion.com/resources/images/icons/new_20.gif"> Communauté</a></li>
    <li><a href="<?php echo $site;?>/articles/<?php
  $noticias = mysqli_query($conn, "SELECT * FROM cms_news ORDER BY id DESC LIMIT 1");
    while ($noticiast = mysqli_fetch_assoc($noticias)) {
                  ?><?php echo $noticiast['id'];?><?php } ?>"><img src="http://habboemotion.com/resources/images/icons/tools_memberlist.gif"> Articles</a></li>
    <li><a href="<?php echo $site;?>/staff"><img src="http://habboemotion.com/resources/images/icons/new_12.gif"> Equipe Staff</a></li>
  </ul>
  <ul id="dropdown3" class="dropdown-content">
    <li><a href="<?php echo $site;?>/badges"><img src="http://habboemotion.com/resources/images/icons/v20_2.gif"> Badges</a></li>
  </ul>
  <ul id="dropdown4" class="dropdown-content">
    <li><a href="<?php echo $site;?>/support"><img src="http://habboemotion.com/resources/images/icons/tools_widgets.gif"> Support</a></li>
  </ul>
  <ul class="sidenav" id="mobile-demo">
  <li><a href="<?php echo $site;?>" style="font-weight: bold;"><?php echo $user['username']; ?></a></li>
  <li><a href="<?php echo $site; ?>/messages">Messages (<?php
$resultado = mysqli_query($conn,"SELECT * FROM messages_privates WHERE receptor = '".$user['username']."'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas"; 
?>)</a></li>
      <li><a href="<?php echo $site;?>/profil/<?php echo $user['id']; ?>">Mon Profil</a></li>
        <li><a href="<?php echo $site;?>/options">paramètres</a></li>
        <li><a href="<?php echo $site;?>/communaute">communauté</a></li>
        <li><a href="<?php echo $site;?>/articless/<?php
  $noticias = mysqli_query($conn, "SELECT * FROM cms_news ORDER BY id DESC LIMIT 1");
    while ($noticiast = mysqli_fetch_assoc($noticias)) {
                  ?><?php echo $noticiast['id'];?><?php } ?>">Articles</a></li>
    <li><a href="<?php echo $site;?>/staff">Equipe Staff</a></li>
        <li><a href="<?php echo $site;?>/badges">Badges</a></li>
        <li><a href="<?php echo $site;?>/support">Support</a></li>
        <li><a href="#">paramètres</a></li>
        <?php if($user['rank'] >= 3){ ?><li><a href="<?php echo $site; ?>/housekeeping" style="color: #f44336;">Administration</a></li><?php } ?>
        <li><a href="<?php echo $site; ?>/me?action=logout" style="color: #f44336;">Déconnexion</a></li>
  </ul>
<?php } ?>