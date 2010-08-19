<?php
session_start();
session_unregister('logname');
session_unregister('auth');
include('http://www.matsadler.com/PIGS/connect.inc');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="matsadler.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<link href="matsadler.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class=maintext1> 
  <p>You have logged out </p>
  <p>Click <a href="index.php">here</a> to continue</p>
</div>
</body>
</html>
