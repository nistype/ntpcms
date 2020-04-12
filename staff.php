<?php
    require 'config/core.php';
    $page = 'Equipe staff';
    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
?>
<div class="container">
  <div class="row">
<div class="col s12 m8" style="position: relative;top:8px;">
  <?php
  $news = mysqli_query($conn, "SELECT * FROM ranks WHERE id >'2' ORDER BY id DESC");
    while ($new = mysqli_fetch_assoc($news))  {
  ?>
  <div class="title-red">
   <?php echo $new['name'];?>
  </div>
  <div class="card">
    <?php
  $staffsu = mysqli_query($conn, "SELECT * FROM users WHERE rank = '{$new['id']}'");
    while ($staffsuv = mysqli_fetch_assoc($staffsu)) {
  ?>
  <div class="staffinfo">
 <div class="habbostaff">
   <img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $staffsuv['look']; ?>&action=std&gesture=srp&direction=2&head_direction=3&size=l&headonly=1&img_format=png" style="float: left;position: relative;top:-15px;"><b><?php
              if ($staffsuv['online'] == 1) {
                echo "<span class='title_status_staff online'></span>";
              } else {
                echo "<span class='title_status_staff'></span>";
              }
            ?><a href="<?php echo $site;?>/profil/<?php echo $staffsuv['id']; ?>" style="color:#444;"><?php echo $staffsuv['username']; ?></a></b>
 </div>
 <div class="infostaff">
  <b><?php
              if ($staffsuv['online'] == 1) {
                echo "<span class='title_status_staff online'></span>";
              } else {
                echo "<span class='title_status_staff'></span>";
              }
            ?><a href="<?php echo $site;?>/profil/<?php echo $staffsuv['id']; ?>" style="color:#eae8e8;"><?php echo $staffsuv['username']; ?></a></b><br>
      <?php
  $badges = mysqli_query($conn, "SELECT * FROM users_badges WHERE user_id = '{$staffsuv['id']}' ORDER BY id LIMIT 6");
    while ($placa = mysqli_fetch_assoc($badges)) {
  ?>
<div class="placast"><img src=""></div>
  <?php 
} ?>
</div>
 <div class="bandera"><img src=""></div>
  </div>
 <?php 
}?>
  </div>
<?php } ?>
    </div>
    <div class="col s12 m4" style="position: relative;top:8px;">
       <div class="title-blue">Equipe staff de <?php echo $sitename; ?></div>
      <div class="card">
        <div class="infohotel">
<center>Hey <?php
$resultado = mysqli_query($conn,"SELECT * FROM users WHERE rank > '3' AND online = '1'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
 
?> <b>Staff's</b> en ligne.</center>
</div>
<b><?php echo $sitename; ?></b> nous voulons le meilleur pour vous, c’est pourquoi nous avons la meilleure équipe staff, capable de vous fournir la meilleure attention en tout ce dont vous avez besoin.<br>
<b>Tu veux faire partie de l’équipe ?</b><br>
Tu es déterminé à rejoindre <?php echo $sitename;?> quand les recrutements seront ouvert vous serez informé via un articles directement sur le site.
      </div>
    </div>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>