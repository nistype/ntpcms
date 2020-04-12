<?php
    require 'config/core.php';
    $page = 'Articles';
    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
?>
<div class="container">
  <div class="row">
<div class="col s12 m8" style="position: relative;top:8px;">
  <?php 
if(isset($_GET['id'])){
if($_GET['id'] && !empty($_GET['id'])){
$hj = mysqli_query($conn,"SELECT * FROM cms_news WHERE id = '{$_GET['id']}'");
$h_edit = mysqli_fetch_array($hj);
  ?>
      <div class="title-green">
   <?php echo $h_edit['title']; ?> <font style="float:right;"><b>[Articles]</b></font>
  </div>
  <div class="card">
    <?php echo $h_edit['longstory']; ?><br>
    <div class="infohotel">Fais par <b><a href="<?php echo $site;?>/profil/<?php echo $h_edit['id']; ?>"><?php echo $h_edit['author']; ?></a></b>
      <font style="float:right;"><?php echo $h_edit['date']; ?></font></div>
  </div>
     <?php
  if(isset($_GET['id'])){
if($_GET['id'] && !empty($_GET['id'])){
  if ((isset($_POST['create']))) {

    $content = $_POST['content'];
    
     $result = mysqli_query($conn,"INSERT INTO news_replies (`author`, `look`, `comentario`, `fecha`, `new_id`) VALUES ('". $user['username']."', '". $user['look']."', '".$content."', '".$date = date('d-m-Y, g:i a', time())."', '".$h_edit['id']."');");
                    if ($result) {
                    echo '<div class="title-green">Tu as commenté ce sujet <b>'.$user['username'].'</b>!</center>
                </div>';
                    }

          }
}
  }
?> 
  <div class="title-red">
   Commentaire <font style="float: right;"><?php
$resultado = mysqli_query($conn,"SELECT * FROM news_replies WHERE new_id = '".$h_edit['id']."'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
 
?> Commentaire(s)</font>
  </div>
  <?php 
$comentj = mysqli_query($conn,"SELECT * FROM news_replies WHERE new_id ='".$h_edit['id']."' ORDER BY id DESC");
while ($comment = mysqli_fetch_assoc($comentj)) {
  ?>
  <div class="comentariosn">
    <div class="circuloc">
      <img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $comment['look']; ?>&action=std&gesture=std&direction=2&head_direction=2&size=l&headonly=1&img_format=png" style="float: left;position: relative;top:-15px;">
    </div>
    <div class="comentarioc"><b><a href="<?php echo $site;?>/profil/<?php echo $comment['id']; ?>"><?php echo $comment['author']; ?>:</a></b>
      <font style="float: right;"><?php echo $comment['fecha']; ?></font>
      <br>
      <?php echo $comment['comentario']; ?><br>
      <?php
if ($comment['author'] == $user['username']) {
  echo "<font style='float:right;color:#BA5252;'><img src='".$site."/assets/images/delete.png' style='position:relative;top:3px;'>Effacer</font>";
}
         else {
          if ($user['rank'] > 3) {
            echo "<font style='float:right;color:#BA5252;'><img src='".$site."/assets/images/delete.png' style='position:relative;top:3px;'>Supprimer</font>";
          }
}
        ?> 
    </div>

  </div>
      <?php } ?>
<?php } } ?>
    </div>
    <div class="col s12 m4" style="position: relative;top:8px;">
       <div class="title-blue">Liste articles</div>
      <div class="card">
     
        <?php
  $noticias = mysqli_query($conn, "SELECT * FROM cms_news ORDER BY id DESC");
    while ($noticiast = mysqli_fetch_assoc($noticias)) {
                  ?>
<div class="infonews">
<a href="<?php echo $site;?>/articles/<?php echo $noticiast['id'];?>" style="color:#4c5c6c;"><font style="float:right;"><b>[Articles]</b></font><?php echo $noticiast['title'];?></a>
</div>
<?php } ?>
      </div>
            <div class="title-red">Publier un Commentaire</div>
            <form method="post">
<textarea id="textque" name="content">
Insérez votre commentaire ici...
</textarea>
<input tabindex="3" class="bancosucces" type="submit" name="create" value="Commenter">
</form>
    </div>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>