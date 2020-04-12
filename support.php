<?php
    require 'config/core.php';
    $page = 'Support';
    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    require 'header.php';
?>
<div class="container">
  <div class="row">
<div class="col s12 m8" style="position: relative;top:8px;">
    <?php
  if ((isset($_POST['create']))) {

    $type = $_POST['type'];
    $story = $_POST['story'];
    
     $result = mysqli_query($conn,"INSERT INTO support (`type`, `user`, `story`, `data`) VALUES ('".$type."', '". $user['username']."', '".$story."', '".$date = date('d-m-Y, g:i a', time())."');");
                    if ($result) {
                      echo '<div class="title-green">Succès ! Envoie correctement effectué</div>';
                    }

          }
              ?>
      <div class="title-red">
   Questions & Suggestions
  </div>
<form method="post">
                <div class="card" style="margin-bottom: 5px;overflow: visible;">
<select style="border: none;box-shadow: 0px 2px #fff;" name="type">
  <option style="border: none;box-shadow: 0px 2px #fff;" value="Queja">Questions</option>
  <option style="border: none;box-shadow: 0px 2px #fff;" value="Sugerencia">Suggestions</option>
</select>
</div>
<textarea id="textque" name="story">
Plainte ou suggestion ici...
</textarea>
  
                <input tabindex="3" class="bancosucces" type="submit" name="create" value="Envoyé">
              </form>
                  </div>
    <div class="col s12 m4" style="position: relative;top:8px;">
        <div class="title-green">Tickets <?php echo $sitename; ?></div>
        <div class="card">
          <div class="infohotel">
            <b>Attention:</b> Tous les tickets que vous ouvrez seront enregistrés dans le panel administratif, donc si vous faites un mauvais usage de ce formulaire ou quelque chose comme ça, vous serez sanctionné. 
          </div>
        </div>
    </div>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>