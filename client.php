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
    <link rel="stylesheet" href="<?php echo $site; ?>/client/loader.css" type="text/css">
    <link rel="shortcut icon" href="<?php echo $site; ?>/assets/images/faviconi.ico">
    <script type="text/javascript" src="<?php echo $site; ?>/client/swfobject.js"></script>
    <style type="text/css">
        
    .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: #105578;
    display:block;
    margin:auto;bottom:0;animation-name:zoomeffect;animation-iteration-count:infinite;animation-direction:alternate;animation-timing-function:linear;animation-duration:.5s}@keyframes zoomeffect{from{transform:scale(1)}to{transform:scale(1.2)}
}
.loader::before{
    display:block;
    position:fixed;
    width:100%;
    height:100%;
    z-index:90000
}
#isload{
    display:block;
    border:6px solid #fff;
    border-radius:90px;
    width:50px;
    height:50px;
    animation:rotar 1s;
    animation-timing-function:linear;
    animation-iteration-count:infinite;
    border-bottom:6px solid #8bc1ee;
    position:absolute;margin:0;left:0
    ;right:0;top:0;bottom:0;margin:auto}@keyframes rotar{from{transform:rotate(0deg)}to{transform:rotate(360deg)}}
    </style>
    
        <script>
if(typeof(window.FlashExternalnterface) === "undefined") {        window.FlashExternalInterface = {};    }
window.FlashExternalInterface.logLoginStep = function(b) {
    if (b == "client.init.start") {
        document.getElementById('loader_bar').style = "width:25%;";
    }
    if (b == "client.init.core.init") {
    document.getElementById('loader_bar').style = "width:40%;";
    }
    if (b == "client.init.auth.ok") {
    document.getElementById('loader_bar').style = "width:50%;";
    }
    if (b == "client.init.localization.loaded") {
    document.getElementById('loader_bar').style = "width:100%;";
    }
    if (b === "client.init.config.loaded") {
                setTimeout(function() {
                      document.getElementById('loader_bar').style = "width:100%;";
                }, 3000);
        setTimeout(function() {
            $('body').addClass('loaded');
        }, 5000);
    }
}
</script>

<div id="loader-wrapper" >

    <div class="loaderdeps">
         <div id="loaderdeps">
            <img id="backh-logo" style="position:absolute;top:-50%;" src="https://backhabbo.fr/assets/images/backhlogo.png">
            <div id="loaderpre">
                <div class="percent" id="loader_bar"></div>
            </div>
        </div>
        <div id="efect-client"></div>
    <div class="loader-section section-top"></div>
    <div class="loader-section section-bottom"></div>
    </div>
</div>

<div class="loader">
<div id="isload">
</div> 
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});
</script>
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
                "hotelview.banner.url" : "http://backhabbo.fr/erreur.php",
                "client.reload.url" : "<?php echo $site; ?>/client.php", 
                "client.fatal.error.url" : "http://backhabbo.fr/erreur.php", 
                "client.connection.failed.url" : "http://backhabbo.fr/erreur.php", 
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
                "ws_url": "ws://37.59.67.137:90",
                "processlog.enabled" : "1", 
                "flash.client.url" : BaseUrl, 
                "flash.client.origin" : "popup",
                "forward.type" : "2", 
                "forward.id" : "<?php if(isset($_GET['room'])){echo $_GET['room'];}?>",
            };
            var params =
            {
                "base" : BaseUrl + "/Habbo.swf",
                "allowScriptAccess" : "always",
                "menu" : "true"                
            };
            swfobject.embedSWF(BaseUrl + "/Habbo.swf", "client", "100%", "100%", "10.0.0", "{swf_folder}/expressInstall.swf", flashvars, params, null);
        </script>

   <div id="client"></div>
</body>
</html>