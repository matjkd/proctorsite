<?php
$user="sadler_pil";
$host="localhost";
$password="Santiago";
$admin_password="Santiago";
$database="sadler_pil";
$connection= mysql_connect($host, $user, $password)
	or die ("oh bah, bah humbug");
 $db = mysql_select_db($database,$connection)
	or die ("seriously you guys, you guys are so seriously.") 
?>

<?php 
$ArrayList = array("_GET", "_POST", "_SESSION", "_COOKIE", "_SERVER");
foreach($ArrayList as $gblArray)
{
   $keys = array_keys($$gblArray);
   foreach($keys as $key)
   {
       $$key = trim(${$gblArray}[$key]);
   }
}
$auth = "yes";
$logname = "mat";
?>