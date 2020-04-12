<?php
    require 'config/core.php';
  if(isset($_GET['id'])){
if($_GET['id'] && !empty($_GET['id'])){
  $comentj = mysqli_query($conn,"SELECT * FROM users WHERE id ='{$_GET['id']}' ORDER BY id DESC");
while ($comment = mysqli_fetch_assoc($comentj)) {
    $page = $comment['username'];
}
}
}

    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
?>
<div class="container">
    <?php if(isset($_GET['id'])){
if($_GET['id'] && !empty($_GET['id'])){
  $comentj = mysqli_query($conn,"SELECT * FROM users WHERE id ='{$_GET['id']}' ORDER BY id DESC");
while ($comment = mysqli_fetch_assoc($comentj)) {
  ?>
  <div class="row">
<div class="col s12 m4">
      <div class="card" style="box-shadow: 0px 0px 5px hsla(0, 0%, 0%, 0.14) !important;border-radius: 4px !important;background: url(<?php echo $site; ?>/assets/images/habbo-star.png) #68a7db;">
<div class="card-content white-text">
        <div class="home-page-pj-bg"></div>
        <table style="border:none;z-index: 10;position: relative;">
            <tbody>
                <tr style="border: none;">
                    <td style="float: left;padding: 0px;">
                        <div class="pj" style="background: url('https://habbo.es/habbo-imaging/avatarimage?figure=<?php echo $comment['look']; ?>&direction=3&head_direction=3&gesture=sml&action=std,drk=44&size=l') no-repeat;position: relative;top:5px;"></div>
                    </td>
                    <td style="float: right; position: absolute;left:85px;top:-60px;">
                        <div class="nickname"><?php echo $comment['username']; ?></div>
                        <div class="motto"><i><?php echo $comment['motto']; ?></i></div>
                        <div class="motto"><img src="<?php echo $site; ?>/assets/images/credits.png"><i><?php echo $comment['credits']; ?> Credits</i></div>
                        <div class="motto"><img src="<?php echo $site; ?>/assets/images/pixels.png"><i><?php echo $comment['pixels']; ?> Pixels</i></div>
                        <div class="motto"><img src="<?php echo $site; ?>/assets/images/points.png"><i><?php echo $comment['points']; ?> Diamands</i></div>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
      </div>
      <div class="title-blue">Badges de <?php echo $comment['username']; ?> (<?php
$resultado = mysqli_query($conn,"SELECT * FROM users_badges WHERE user_id = '".$comment['id']."'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas"; 
?>)</div>
      <div class="card" style="height: 120px;overflow-y: scroll;">
        <?php $getmybadges = mysqli_query($conn, "SELECT * FROM users_badges WHERE user_id = '".$comment['id']."' ORDER BY id DESC");

                while($badges = mysqli_fetch_assoc($getmybadges)) {?>
     <div class="badgesperfil"><img src="<?php echo $linkswf;?><?php echo $badges['badge_code']; ?>.gif"></div>
   <?php } ?> 
      </div>
      <div class="title-red">Rooms de <?php echo $comment['username']; ?> (<?php
$resultado = mysqli_query($conn,"SELECT * FROM rooms WHERE owner_id = '".$comment['id']."'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas"; 
?>)</div>
      <div class="card">
        <?php $getmybadges = mysqli_query($conn, "SELECT * FROM rooms WHERE owner_id = '".$comment['id']."' ORDER BY id DESC");

                while($badges = mysqli_fetch_assoc($getmybadges)) {?>
        <div class="infohotel"><img src="<?php echo $site;?>/assets/images/room.gif"><font style="position: relative;top:-10px;"><b><?php echo $badges['name'];?></b></font></div>
      <?php } ?>
      </div>
    </div>
<div class="col s12 m8" style="position: relative;top:8px;">
  <?php
  $news = mysqli_query($conn, "SELECT * FROM ranks WHERE id = '".$comment['rank']."'  ORDER BY id DESC");
    while ($new = mysqli_fetch_assoc($news))  {
  ?><div class="title-red">
           <?php echo $new['name'];?>
  </div>
  <?php } ?>
      <div class="card">
        Informations sur <?php echo $comment['username'];?>
        <div class="infohotel">
          <div class="infoperfil1">Commentaire(s): <b><?php
$resultado = mysqli_query($conn,"SELECT * FROM news_replies WHERE author = '".$comment['username']."'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas"; 
?></b></div>
<div class="infoperfil1"><b><?php
$resultado = mysqli_query($conn,"SELECT * FROM support WHERE user = '".$comment['username']."'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas"; 
?></b> Ticket(s).</div>

<div class="infoperfil1">Message(s) <b><?php
$resultado = mysqli_query($conn,"SELECT * FROM messages_privates WHERE receptor = '".$comment['username']."'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas"; 
?></b> reçu.</div>
<div class="infoperfil1">Message(s) <b><?php
$resultado = mysqli_query($conn,"SELECT * FROM messages_privates WHERE author = '".$comment['username']."'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas"; 
?></b> envoyée.</div>
        </div>
      </div>
      <a href="<?php echo $site;?>/newsms/<?php echo $comment['id'];?>"><div class="title-green"><center>Envoyé un message privé à <?php echo $comment['username'];?></center></div></a>
    </div>
    </div>
       <?php } } } ?>
  </div>
</div>
<?php require 'footer.php'; ?>