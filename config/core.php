<?php
    error_reporting(0);

    // Connexion db
    $conn = new mysqli('host', 'dbname', 'mdp', 'dbuser');
    session_start();
    // Ajuster le siteweb
    $sitename = "Habbo";
    $linkswf = "https://localhost/swf/c_images/album1584/"; // Lien pour les badges du cms
    $site = "localhost";
    $colorsv = "#14b3e2";
    $facebook = "https://www.facebook.com/id;
    $prod = ""; // Production
    $hswf = ""; // Habbo.swf
    $iphost = ""; // IP EMU
    $porthost = ""; // Port EMU
    $eft = ""; // External Flash Texts
    $ev = ""; // External Variables
    $eot = ""; // External Override Texts
    $eov = ""; // External Override Variables
    $fida = ""; // Figuredata
    $fima = ""; // Figuremap
    $fuda = ""; // Furnidata
    $pd = ""; // Productdata
    $cloading = "Habbo est en cours de chargement.."; // Texte chargement hotel
    $error = ""; // Page d'erreur
    date_default_timezone_set('America/Mexico_City');  // Zone horraires
    $register = array(
        'credits' => '100000',
        'pixels' => '0',
        'vip_points' => '4',
        'motto' => '',
        'look' => 'hd-180-2.hr-891-45.ha-1004-110.he-3376-92.fa-3296-62.ch-255-71.lg-270-110.sh-290-71.wa-3074-92'
    ]);


    if(isset($_SESSION['id'])){
        $sql_user = "SELECT * FROM users WHERE id='". $_SESSION['id'] ."'";
        $result_sql_user = $conn->query($sql_user);
        $user = $result_sql_user->fetch_array();
    }
    $l_ban = mysqli_query($conn, "SELECT * FROM bans WHERE value = '". $user['id'] ."' OR value = '". $ip ."'");
    if(mysqli_num_rows($l_ban) > 0)
    {
        $ban = mysqli_fetch_assoc($l_ban);
        echo '<div id="error" style="background:#A40101; color:#FFFFFF; width:750px;margin-left:auto;margin-right:auto; height:23px; line-height:23px; font-size:17px; text-align:center; margin-top:-4px;">
        Erreur: Tu es exclu pour la raison: '.$ban['reason'].' !
        </div>';
        $loginerror = true;
    }
    $sql_news = "SELECT * FROM cms_news ORDER BY id DESC LIMIT 8";
    $result_news = $conn->query($sql_news);

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    if($_GET['action'] == 'logout'){
        session_destroy();
        header("Location: $site");
    }
?>
