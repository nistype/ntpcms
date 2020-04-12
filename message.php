<?php
    require 'config/core.php';
    $page = 'message privé';
    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
?>
<div class="container">
  <div class="row">
    <?php  if(isset($_GET['id'])){
if($_GET['id'] && !empty($_GET['id'])){
  $comentj = mysqli_query($conn,"SELECT * FROM messages_privates WHERE id ='{$_GET['id']}' ORDER BY id DESC");
while ($comment = mysqli_fetch_assoc($comentj)) {
  ?>
<div class="col s12 m8" style="position: relative;top:8px;">
   <div class="title-green">
   Re: <?php echo $comment['title'];?>
  </div>
  <div class="card">
  <?php echo $comment['message'];?>
  <div class="infohotel">Envoyé par <b><?php echo $comment['author'];?></b><font style="float:right;"><?php echo $comment['data'];?></font></div>
  </div>
  <div class="title-blue">Repondre à <?php echo $comment['author'];?></div>
   <?php
  if ((isset($_POST['create']))) {

    $dest = $_POST['dest'];
    $title = $_POST['title'];
    $message = $_POST['message'];
     $result = mysqli_query($conn,"INSERT INTO messages_privates (`author`, `title`, `message`, `data`, `receptor`) VALUES ('".$user['username']."', '".$title."', '".$message."', '".$date = date('d-m-Y / g:i a', time())."', '".$dest."');");
if ($result) {
                    echo '<div class="title-green">Tu as bien répondu à '.$dest.' !</div>';
    }
    }
?> 
  <form method="post">
    <input tabindex="4" id="bancoin" type="text" name="dest" value="<?php echo $comment['author'];?>">
     <input tabindex="4" id="bancoin" type="text" name="title" value="Re: <?php echo $comment['title'];?>">
     <textarea id="bancoin" name="message" style="width: 100%;height: 200px;resize: none;">Ton message ici
     </textarea>
     <input tabindex="3" class="bancosucces" type="submit" name="create" value="Répondre">
   </form>
<?php } } } ?>
    </div>
    <div class="col s12 m4" style="position: relative;top:8px;">
      <div class="title-red">Message</div>
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