<?php
    require 'config/core.php';
    $page = 'Communauté';
    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
?>
<div class="container">
  <div class="row">
<div class="col s12 m13">
  <div class="title-red">
  Utilisateurs aux hasards
  </div>
      <div class="card" style="overflow:visible;height:auto;padding-bottom:15px;background: url(<?php echo $site; ?>/assets/images/clouds.png);">
 <?php
  $news = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC LIMIT 13");
    while ($new = mysqli_fetch_assoc($news)) {
                  ?>
                      <a class="tooltip" href="<?php echo $site;?>/profil/<?php echo $new['id']; ?>">

                        <div class="community_hover">

                          <div class="content_padding smaller">

                            <div class="content_title">

                              <font style="color:#aaaaaa;position: relative;top:5px;"><?php echo $new['username'];?></font>
                                <?php
              if ($new['online'] == 1) {
                echo "<span class='title_status online'></span>";
              } else {
                echo "<span class='title_status'></span>";
              }
            ?>

                            </div>

                          </div>

                        </div>

                        <img src="https://www.habbo.nl/habbo-imaging/avatarimage?figure=<?php echo $new['look'];?>&direction=4&head_direction=4" height="110" width="64">

                      </a>
                      <?php } ?>
      </div>
    </div>
<div class="col s12 m8" style="position: relative;top:8px;">
   <div class="title-green">
   Derniers utilisateurs
  </div>
  <div class="card" style="background: url(<?php echo $site; ?>/assets/images/cloudsweek.png);height: 100px;">
       <?php
  $noticias = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC LIMIT 1");
    while ($noticiast = mysqli_fetch_assoc($noticias)) {
                  ?>
    <img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $noticiast['look']; ?>&action=std&gesture=std&direction=2&head_direction=2&size=l&headonly=1&img_format=png" style="float: left;position: relative;top:-15px;">
    <div class="card" style="width: auto;float:left;position: relative;top:10px;"><b><a href="<?php echo $site;?>/profil/<?php echo $noticiast['id']; ?>" style="color:#444;"><?php echo $noticiast['username']; ?></a></b>: <?php echo $noticiast['motto']; ?></div>
  <?php } ?>
  </div>
    </div>
    <div class="col s12 m4" style="position: relative;top:8px;">
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