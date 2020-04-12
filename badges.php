<?php
    require 'config/core.php';
    $page = 'Badges';
    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
?>
<div class="container">
  <div class="row">
<div class="col s12 m8" style="position: relative;top:8px;">
  <?php   
    if(isset($_POST['buybadge'])){
      $badgec = $_POST['buybadgecode'];
      $badgel = mysqli_query($conn,"SELECT id,code,price FROM cms_badges WHERE code = '".$badgec."' LIMIT 1");
      $userid = $user['id'];
      if(mysqli_num_rows($badgel) > 0){
        $badgef = mysqli_fetch_array($badgel);
        $cibadge = $badgef['id'];
        $cdbadge = $badgef['code'];
        $cpbadge = $badgef['price'];
        $badgen = mysqli_query($conn,"SELECT * FROM users_badges WHERE badge_code = '".$cdbadge."' AND user_id = '".$user['id']."' LIMIT 1");
        if(mysqli_num_rows($badgen) > 0){
          echo '<div class="title-red" style="margin-bottom:10px;">Erreur ! On dirait que tu as déjà le badge !</div>';
        }elseif($user['online'] == 1){
          echo '<div class="title-red" style="margin-bottom:10px;">Erreur ! Vous devez être en dehors du client pour éviter les erreurs !</div>';
        }elseif($badgef['cant'] >= 0){
          echo '<div class="title-green" style="margin-bottom:10px;">Badge acheté!</div>';
          $do1 = mysqli_query($conn,"UPDATE users SET credits = credits - '".$cpbadge."' WHERE username = '".$user['username']."'");
          $do2 = mysqli_query($conn,"UPDATE cms_badges SET  cant = cant - '1' WHERE id = '".$cibadge."'");
          $do3 = mysqli_query($conn,"DELETE FROM cms_badges WHERE cant = '0' AND id = '".$cibadge."' ");
          
          $query = mysqli_query($conn,"INSERT INTO users_badges (user_id, badge_code, slot_id) VALUES ('".$user['id']."', '".$cdbadge."', '0');");  
        }else{
          echo '<div class="title-red" style="margin-bottom:10px;">Erreur ! Tu n’as pas assez de diamants pour acheter le badge.</div>';
          }
      }else{
        $error2 = '<div class="title-red" style="margin-bottom:10px;">Erreur ! Ce badge n’est pas disponible.</div>';
      }     
    }
    ?>
      <div class="title-green">
   Acheter un badge
  </div>
  <div class="placasventas">
    <?php $badges = mysqli_query($conn,"SELECT * FROM cms_badges ORDER BY id DESC");
while($badge = mysqli_fetch_array($badges)){ ?>
    <div class="placaventa">
      <form method="post">
      <input type="text" name="buybadgecode" value="<?php echo $badge['code'];?>" style="height: 10px;font-size:13px;border:none;text-align: center;"><br>
      <div class="placasv"><img src="<?php echo $linkswf;?><?php echo $badge['code'];?>.gif"></div>
      <div class="preciov"><?php echo $badge['price'];?> <img src="<?php echo $site; ?>/assets/images/credits.png" style="position: relative;top:3px;"></div>
     <div id="dispov"><?php echo $badge['cant'];?> exp(s).</div>
      <input type="submit" name="buybadge" id="comprarv" value="Acheter">
    </form>
    </div>
<?php } ?>
  </div>
    </div>
    <div class="col s12 m4" style="position: relative;top:8px;">
      <div class="title-blue">Soldes</div>
      <div class="card">
        <div class="infohotel">
         <?php echo $user['credits']; ?> <b>Credits</b>
        </div>
        <div class="infohotel">
          <?php echo $user['points']; ?> <b>Diamands</b>
        </div>
          <div class="infohotel">
          <?php echo $user['pixels']; ?> <b>Pixels</b>
        </div>
        </div>
       <div class="title-red">Acheter un badge</div>
       <div class="card">
        <center>Dépêchez-vous d’acheter votre badge, car ils sont limités à un certain nombre de pièces !</center>
      </div>
    </div>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>