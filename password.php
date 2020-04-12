<?php
    require 'config/core.php';
    $page = 'Mot de passe';
    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
?>
<div class="container">
  <div class="row">
<div class="col s12 m8" style="position: relative;top:8px;">
<?php
                  if(isset($_POST['savepass'])){
      $pp = $_POST['ppassword'];
      $pnp = $_POST['pnpass'];
      $prp = $_POST['pnrp'];
      $orpassword = md5($pp);
      $newpassword = md5($pnp);
      if($orpassword !== $user['password']){
          echo '<div class="title-red">Erreur! Ton mot de passe actuel ne conviens pas</div>';
      }else{
        if(strlen($pnp) < 6 || strlen($pnp) > 32){
        echo '<div class="title-red">Erreur!</div>';
        }else{
          if($pnp !== $prp){
          echo '<div class="title-red">Erreur!</div>';
          }else{
            mysqli_query($conn,"UPDATE users SET password = '".$newpassword."' WHERE id = '".$user['id']."' LIMIT 1");
            $user['password'] = $newpassword;
                  echo '<div class="title-green">¡Super! Ton mot de passe à bien étais changé!</div>';
          }
        }
      }
    }
    ?>
      <div class="title-green">
   Change ton mot de passe 
  </div>
<form method="post">
  <input id="bancoin" type="password" name="ppassword" placeholder="Mot de passe actuel"/>
  <input id="bancoin" type="password" name="pnpass" placeholder="Nouveau mot de passe"/>
  <input id="bancoin" type="password" name="pnrp" placeholder="Repete ton mot de passe actuel"/>
  <input class="bancosucces" id="confirm_changes" type="submit" name="savepass" value="Actualiser mon mot de passe"/>
</form>
    </div>
    <div class="col s12 m4" style="position: relative;top:8px;">
            <div class="title-red">Paramètres</div>
      <div class="card">
<div class="infohotel">
  <a href="<?php echo $site;?>/options"><b>Changer son email</b></a>
</div>
<div class="infohotel">
  <a href="<?php echo $site;?>/password"><b>Changer son mot de passe</b></a>
</div>
      </div>
       <div class="title-blue">Statistiques</div>
      <div class="card">
     <div class="infohotel">
          Tu as <?php echo $user['credits']; ?> <b>Credits</b>
        </div>
        <div class="infohotel">
          Tu as <?php echo $user['points']; ?> <b>Diamands</b>
        </div>
          <div class="infohotel">
          Tu as <?php echo $user['pixels']; ?> <b>Pixels</b>
        </div>
        <div class="infohotel">
          Tu as <?php
$resultado = mysqli_query($conn,"SELECT * FROM rooms WHERE owner_id = '".$user['id']."'");
$número_filas = mysqli_num_rows($resultado);
 
echo "$número_filas";
 
?> <b> Rooms</b> 
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>