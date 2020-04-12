<?php
    include "config/core.php";
    include "config/ticket.php";

    session_start();

    if(!isset($_SESSION['id'])){
        header("Location: $site");
    }
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE id = '".$_SESSION['id']."'");
    $myuser = mysqli_fetch_assoc($sql);

    $query = mysqli_query($conn, "UPDATE users SET auth_ticket = '', auth_ticket = '".GenerateTicket()."', ip_current = '', ip_current = '".$ip."' WHERE id = '".$_SESSION['id']."'");

    $ticketsql = mysqli_query($conn, "SELECT * FROM users WHERE id = '".$_SESSION['id']."'");
    $ticketrow = mysqli_fetch_assoc($ticketsql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $sitename;?> - Client</title>
    <link rel="stylesheet" href="<?php echo $site; ?>/client/css/client.css" type="text/css">
    <link rel="shortcut icon" href="<?php echo $site; ?>/assets/images/favicon.ico">
    <script type="text/javascript" src="<?php echo $site; ?>/client/swfobject.js"></script>
</head>
<body>
        <script type="text/javascript">
            var BaseUrl = "<?php echo $prod; ?>";
            var flashvars =
            {
                "client.starting" : "<?php echo $cloading; ?>", 
                "client.allow.cross.domain" : "1", 
                "client.notify.cross.domain" : "0", 
                "connection.info.host" : "<?php echo $iphost; ?>", 
                "connection.info.port" : "<?php echo $porthost; ?>", 
                "site.url" : "<?php echo $site; ?>/", 
                "url.prefix" : "<?php echo $site; ?>/", 
                "hotelview.banner.url" : "http://88.99.153.133/erreur.php",
                "client.reload.url" : "<?php echo $site; ?>/client.php", 
                "client.fatal.error.url" : "http://88.99.153.133/erreur.php", 
                "client.connection.failed.url" : "http://88.99.153.133/erreur.php", 
                "external.variables.txt" : "<?php echo $ev; ?>", 
                "external.texts.txt" : "<?php echo $eft; ?>",
                "external.override.texts.txt" : "<?php echo $eot; ?>",
                "external.override.variables.txt" : "<?php echo $eov; ?>",
                "external.figurepartlist.txt" : "<?php echo $fida; ?>",
                "flash.dynamic.avatar.download.configuration" : "<?php echo $fima; ?>",
                "productdata.load.url" : "<?php echo $pd; ?>", 
                "furnidata.load.url" : "<?php echo $fuda; ?>", 
                "use.sso.ticket" : "1", 
                "sso.ticket" : "<?php echo $ticketrow['auth_ticket']; ?>", 
                "ws_url": "ws://88.99.153.133:90",
                "processlog.enabled" : "0", 
                "flash.client.url" : BaseUrl, 
                "flash.client.origin" : "popup",
                "forward.type" : "2", 
                "forward.id" : "<?php if(isset($_GET['room'])){echo $_GET['room'];}?>",
            };
            var params =
            {
                "base" : BaseUrl + "/Habbo.swf",
                "allowScriptAccess" : "always",
                "menu" : "false"                
            };
            swfobject.embedSWF(BaseUrl + "/Habbo.swf", "client", "100%", "100%", "10.0.0", "{swf_folder}/expressInstall.swf", flashvars, params, null);
        </script>

<div id="client"></div>
</body>
</html>