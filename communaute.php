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
      <div class="card" style="overflow:visible;height:auto;padding-bottom:15px;background: url(https://www.habbox.com/images/calvin/archive/images/backgrounds/tiles/DE_Background_Summer.gif);">
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
      <iframe src="https://discordapp.com/widget?id=703936648291024897&theme=dark" width="620" height="240" allowtransparency="true" frameborder="0"></iframe>
    <div class="col s12 m4" style="position: relative;top:8px;">
       <div class="title-blue">Statistiques</div>
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