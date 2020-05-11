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
     <div class="card" style="box-shadow: 0px 0px 5px hsla(0, 0%, 0%, 0.14) !important;border-radius: 4px !important;background: url(https://i.imgur.com/J6aDQol.png) no-repeat 0% 100%, url(https://backhabbo.fr/assets/images/clouds.png) #68a7db;">
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
      <div class="title-blue">Statistiques</div>
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
  <div class="title-menews">
    Dernier article
  </div>
      <div class="menews">
        <table style="background-image: url('http://habboemotion.com/resources/images/topstory/RoomDimmerTopStory2.gif');">
          <?php
  $noticias = mysqli_query($conn, "SELECT * FROM cms_news ORDER BY id DESC LIMIT 1");
    while ($noticiast = mysqli_fetch_assoc($noticias)) {
                  ?>
          <tbody>
            <td align="left" style="border:0px solid #fff;width: 49px;">
              <img src="http://habboemotion.com/resources/images/icons/me_news_active.gif">
            </td>
            <td align="left" style="border:0px solid #fff;width: 80%;">
             <font style="color:#e4e7ea;font-size: 14px;"><a href="<?php echo $site;?>/articles/<?php echo $noticiast['id'];?>" style="color:#ced4d9;">[Article] <b><?php echo $noticiast['title'];?></b></a></font>
             <br>
             <font style="color:#FFF;font-size: 14px;"><?php echo $noticiast['shortstory'];?></font>
            </td>
            <td align="center" style="text-align:center;font-size:14px;color:#e4e7ea;border:0px solid #fff;width: 20%;">
              <i><?php echo $noticiast['date'];?></i><br>
              <a href="<?php echo $site;?>/articles/<?php echo $noticiast['id'];?>" style="color:#f04747;"><u>En savoir plus</u></a>
            </td>
          </tbody>
        <?php } ?>
        </table>
      </div>
      <div class="title-meuser">
   Dernier utilisateur
  </div>
 <div class="meuser" style="background: url(http://habboemotion.com/resources/images/topstory/ts_lostcity_cliffs.gif);height:115px; border-radius: 5px; /*;;">
       <?php
  $noticias = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC LIMIT 1");
    while ($noticiast = mysqli_fetch_assoc($noticias)) {
                  ?>
    <img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $noticiast['look']; ?>&action=std&gesture=eyb&direction=2&head_direction=3&size=l&headonly=1&img_format=png" style="float: left;position: relative;top:-15px;">
    <div class="meuser" style="width: auto;float:left;position: relative;margin-top: 15px;margin-left:-15px;"><b><a href="<?php echo $site;?>/profil/<?php echo $noticiast['id']; ?>" style="color:#f4f2f2;"><?php echo $noticiast['username']; ?></a></b></div>
  <?php } ?>
    </div>
       <div class="title-riche">
   Joueur le plus riche
  </div>
     <div class="riche" style="background: url(http://habboemotion.com/resources/images/topstory/ts_MayCollectible_v1.gif);height:115px; border-radius: 5px; /*;;">
       <?php
  $noticias = mysqli_query($conn, "SELECT * FROM users ORDER BY points DESC LIMIT 1");
    while ($noticiast = mysqli_fetch_assoc($noticias)) {
                  ?>
    <img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $noticiast['look']; ?>&action=std&gesture=srp&direction=3&head_direction=3&size=l&headonly=1&img_format=png" style="float: left;position: relative;top:-15px;">
    <div class="meuser" style="width: auto;float:left;position: relative;margin-top: 15px;margin-left:-15px;"><b><a href="<?php echo $site;?>/profil/<?php echo $noticiast['id']; ?>" style="color:#f4f2f2;"><?php echo $noticiast['username']; ?></a></b></div>
  <?php } ?>
  </div>
     <div class="title-jmois">
   Joueur du mois
  </div>
     <div class="jmois" style="background: url(http://habboemotion.com/resources/images/topstory/ts_ltribe_ants.gif);height:115px; border-radius: 5px; /*;;">
       <?php
  $noticias = mysqli_query($conn, "SELECT * FROM users ORDER BY jmois DESC LIMIT 1");
    while ($noticiast = mysqli_fetch_assoc($noticias)) {
                  ?>
    <img src="https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $noticiast['look']; ?>&action=std&gesture=agr&direction=3&head_direction=3&size=l&headonly=1&img_format=png" style="float: left;position: relative;top:-15px;">
    <div class="meuser" style="width: auto;float:left;position: relative;margin-top: 15px;margin-left:-15px;"><b><a href="<?php echo $site;?>/profil/<?php echo $noticiast['id']; ?>" style="color:#f4f2f2;"><?php echo $noticiast['username']; ?></a></b></div>
  <?php } ?>
  </div>
    </div>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>