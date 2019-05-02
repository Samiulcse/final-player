<?php
error_reporting(0);
$url = $_GET['url'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8"/>

<link rel="shortcut icon" href="/drive_favicon.ico">
<meta name="robots" content="noindex" />
<META NAME="GOOGLEBOT" CONTENT="NOINDEX" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<script type="text/javascript" src="jwplayer.js"></script>
<script type="text/javascript">jwplayer.key = "Ywok59g9j93GtuSU7+axNzjIp/TBfiK4s0vvYg==";</script>
<style type="text/css">*{margin:0;padding:0}#container{position:absolute;width:100%!important;height:100%!important}</style>
</head>
<body>
<div id="container" class="container"></div>
<script type="text/javascript">
var playerInstance = jwplayer("container");
playerInstance.setup({
width: "100%",
height: "100%",
controls: true,
displaytitle: true,
aspectratio: "16:9",
fullscreen: "true",
primary: 'html5',
provider: 'http',
autostart: false,
file: '<?php echo $url ; ?>',

        abouttext: "Samiul",
        aboutlink: "#"
    });
    
</script>
</body>
</html>