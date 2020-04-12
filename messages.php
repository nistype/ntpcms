<?php
    require 'config/core.php';
    $page = 'Vos messages privés';
    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
     if(isset($_GET['action'])){

if($_GET['action'] == "err" && !empty($_GET['id'])){

            $query = mysqli_query($conn,"DELETE FROM messages_privates WHERE id = '{$_GET['id']}'");

            if($query){

            $exito143 = "<div class='alert alert-success fade show' role='alert'>Exito borrada correctamente <b>'".$user['username']."'</b></div>";
            header("Location: $site/mensajes");   

            }                  
    }

}
?>
<div class="container">
  <div class="row">
<div class="col s12 m8" style="position: relative;top:8px;">
   <div class="title-green">
   Vos messages 
  <a href="<?php echo $site;?>/newsms" style="text-decoration: none;color:rgba(0,0,0, .4);"><div class="newmensaje">Nouveau message</div></a>
  </div>
  <div class="card">
  <div class="infohotel"><b>Note:</b> Évitez d’envoyer du Pornographique ou d’insulter, etc, nous saurons ce que vous envoyez, car nous avons un enregistrement dans la base de données, faites attention à ce que vous envoyez, ne faites pas de spam.</div>
  <table>
    <thead>
    <tr>
    <th>Titre du message</th>
    <th>Auteur</th>
    <th>Date</th>
    <th></th>
    </tr>
    </thead>
    <tbody style="background: #eff2f5;">
      <?php
  $noticias = mysqli_query($conn, "SELECT * FROM messages_privates WHERE receptor = '".$user['username']."'");
    while ($noticiast = mysqli_fetch_assoc($noticias)) {
                  ?>
      <tr>
        <td><?php echo $noticiast['title'];?></td>
        <td><?php echo $noticiast['author'];?></td>
        <td><?php echo $noticiast['data'];?></td>
        <td>
          <a href="<?php echo $site;?>/message/<?php echo $noticiast['id'];?>">Message</a> /
          <a href="<?php echo $site;?>/messages.php?action=err&id=<?php echo $noticiast['id'];?>">Supprimer</a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  </div>
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