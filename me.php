<?php
    require 'config/core.php';
    $page = 'me';
    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
?>
<div class="container">
  <div class="row">
<div class="col s12 m4">
      <div class="card" style="box-shadow: 0px 0px 5px hsla(0, 0%, 0%, 0.14) !important;border-radius: 4px !important;background: url(assets/images/habbo-star.png) no-repeat 0% 92%, url(<?php echo $site; ?>/assets/images/clouds.png) #68a7db;">
<div class="card-content white-text">
        <div class="home-page-pj-bg"></div>
        <table style="border:none;z-index: 10;position: relative;">
            <tbody>
                <tr style="border: none;">
                    <td style="float: left;padding: 0px;">
                        <div class="pj" style="background: url('https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $user['look']; ?>&direction=2&head_direction=3&gesture=srp&action=std,crr=667&size=l') no-repeat;position: relative;top:5px;"></div>
                    </td>
                    <td style="float: right; position: absolute;left:85px;top:-60px;">
                        <div class="nickname"><?php echo $user['username']; ?></div>
                        <div class="motto"><i><?php echo $user['motto']; ?></i></div>
                        <div class="motto"><img src="<?php echo $site; ?>/assets/images/credits.png"><i><?php echo $user['credits']; ?> Credits</i></div>
                        <div class="motto"><img src="<?php echo $site; ?>/assets/images/pixels.png"><i><?php echo $user['pixels']; ?> Pixels</i></div>
                        <div class="motto"><img src="<?php echo $site; ?>/assets/images/points.png"><i><?php echo $user['points']; ?> Diamands</i></div>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
      </div>
      <div class="title-blue">Statistiques de <?php echo $sitename; ?></div>
      <div class="card">
        <div class="infohotel">
<b>Rooms</b> <?php
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
<b>Utilisateurs enregistrés :</b> <?php
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
<div class="col s12 m8" style="position: relative;top:8px;">
  <div class="title-red">
    Derniers articles
  </div>
      <div class="card">
        <table style="background: #eff2f5;">
          <?php
  $noticias = mysqli_query($conn, "SELECT * FROM cms_news ORDER BY id DESC LIMIT 5");
    while ($noticiast = mysqli_fetch_assoc($noticias)) {
                  ?>
          <tbody>
            <td align="left" style="border:2px solid #fff;width: 49px;">
              <img src="<?php echo $site; ?>/assets/images/<?php echo $noticiast['type'];?>.png">
            </td>
            <td align="left" style="border:2px solid #fff;width: 80%;">
             <font style="color:#4c5c6c;font-size: 14px;"><a href="<?php echo $site;?>/articles/<?php echo $noticiast['id'];?>" style="color:#4c5c6c;">[Article] <b><?php echo $noticiast['title'];?></b></a></font>
             <br>
             <font style="color:#000;font-size: 14px;"><?php echo $noticiast['shortstory'];?></font>
            </td>
            <td align="center" style="text-align:center;font-size:14px;color:#4c5c6c;border:2px solid #fff;width: 20%;">
              <i><?php echo $noticiast['date'];?></i><br>
              <a href="<?php echo $site;?>/articles/<?php echo $noticiast['id'];?>" style="color:#4c5c6c;"><u>En savoir plus</u></a>
            </td>
          </tbody>
        <?php } ?>
        </table>
      </div>
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
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>