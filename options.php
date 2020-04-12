<?php
    require 'config/core.php';
    $page = 'Paramètres';
    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
?>
<div class="container">
  <div class="row">
<div class="col s12 m8" style="position: relative;top:8px;">
  <?php
    if(isset($_POST['save'])){
      $emaila = $_POST['emaila'];
      $emailn = $_POST['emailn'];
      $email_check = preg_match("/^[a-z0-9_\.-]+@([a-z0-9]+([\-]+[a-z0-9]+)*\.)+[a-z]{2,7}$/i", $emailn);
      if(empty($emaila) || empty($emailn)){
        echo '<div class="title-red">Tu dois remplir tous les espaces.</div>';
      }elseif($emaila !== $user['mail']){
        echo '<div class="title-red">L’email que tu as posté n’est pas la même.</div>';
      }elseif($email_check !== 1){
        echo '<div class="title-red">Insert une adresse e-mail valide.</div>';
      }else{
        mysqli_query($conn,"UPDATE users SET mail = '".$emailn."' WHERE id = '".$user['id']."' LIMIT 1");                         
        echo '<div class="title-green">Succès ! Votre e-mail a été mis à jour !</div>';
      }
    }
  ?>
      <div class="title-green">
   Changer ton adresse email
  </div>
    <form method="post">
                  <input id="bancoin" type="text" name="emaila" value="<?php echo $user['mail'];?>"/>
                  <input id="bancoin" type="text" name="emailn" value="Nouveau email"/>
                  <input class="bancosucces" id="confirm_changes" type="submit" name="save" value="Actualiser ton email"/>
                </form>
    </div>
    <div class="col s12 m4" style="position: relative;top:8px;">
            <div class="title-red">Modifier t'es informations</div>
      <div class="card">
<div class="infohotel">
  <a href="<?php echo $site;?>/options"><b>Changer d'Email</b></a>
</div>
<div class="infohotel">
  <a href="<?php echo $site;?>/password"><b>Changer ton mot de passe</b></a>
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