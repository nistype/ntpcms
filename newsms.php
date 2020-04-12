<?php
    require 'config/core.php';
    $page = 'Envoyer un message';
    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
?>
<div class="container">
  <div class="row">
<div class="col s12 m8" style="position: relative;top:8px;">
   <div class="title-green">
   Ecrire un nouveau message
  </div>
  <?php
  if ((isset($_POST['create']))) {

    $dest = $_POST['dest'];
    $title = $_POST['title'];
    $message = $_POST['message'];
     $result = mysqli_query($conn,"INSERT INTO messages_privates (`author`, `title`, `message`, `data`, `receptor`) VALUES ('".$user['username']."', '".$title."', '".$message."', '".$date = date('d-m-Y / g:i a', time())."', '".$dest."');");
if ($result) {
                    echo '<div class="title-green">Tu as envoyé un message à '.$dest.' ! </div>';
    }
    }
?> 
  <form method="post">
    <input tabindex="4" id="bancoin" type="text" name="dest" value="Vérifie et écris bien le nom à qui ce message est adressé.">
     <input tabindex="4" id="bancoin" type="text" name="title" value="Titre du message">
     <textarea id="bancoin" name="message" style="width: 100%;height: 200px;resize: none;">Message...</textarea>
     <input tabindex="3" class="bancosucces" type="submit" name="create" value="Envoyé">
   </form>
    </div>
    <div class="col s12 m4" style="position: relative;top:8px;">
      <div class="title-red">Messages de <?php echo $user['username']; ?></div>
      <div class="card">
         <div class="infohotel">
          <a href="<?php echo $site;?>/newsms"><b>Nouveau message</b></a>
        </div>
        <div class="infohotel">
          <a href="<?php echo $site;?>/messages"><b>Messages reçus</b></a>
        </div>
         <div class="infohotel">
          <a href="<?php echo $site;?>/smsenv"><b>Messages envoyées</b></a>
        </div>
      </div>
       <div class="title-blue">Statistiques de <?php echo $sitename; ?></div>
      <div class="card">
        <div class="infohotel">
<b>Rooms:</b> <?php
$resultado = mysqli_query($conn,"SELECT * FROM rooms WHERE id");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
 
?></div>
<div class="infohotel">
<b>Utilisateurs bannis:</b> <?php
$resultado = mysqli_query($conn,"SELECT * FROM bans WHERE id");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
 
?>
</div>
<div class="infohotel">
<b>Utilisateurs enregistrés:</b> <?php
$resultado = mysqli_query($conn,"SELECT * FROM users WHERE id");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
 
?>
</div>
<div class="infohotel">
<b>Utilisateurs Online:</b> <?php
$resultado = mysqli_query($conn,"SELECT * FROM users WHERE online = '1'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
 
?>
</div>
<div class="infohotel">
<b>Photos:</b> <?php
$resultado = mysqli_query($conn,"SELECT * FROM camera_web WHERE id");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
 
?>
</div>
      </div>
    </div>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>