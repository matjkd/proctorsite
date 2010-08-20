<?php
session_start();
require_once('../property.inc'); 
if (@$auth != "yes")
{
echo "You can't view this page";
exit();
}


 
 //This following statement attains the data of the user and checks their security rating with a switch
 $sql = "SELECT * FROM members WHERE username='$logname'";
	$result = mysql_query($sql)
				or die("error");
	$row = mysql_fetch_array($result, MYSQL_ASSOC);
	extract($row);
	if ($securityrating >4)
	{
	$bouncer="passwordwrong";
	}
	else
	{
	$bouncer="comein";
	}
	
	
  ?>
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>add client</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../matsadler.css" rel="stylesheet" type="text/css">
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
<link href="../pilcss3.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="Layer1" class="maintext1"> 
  <?php
switch ($bouncer)
{
case  "comein" :
	 
	echo "Add employee to $companyid"; ?>
  <form name= '$PHP_SELF'  method='post' action='clientsent.php' >
    <table width='414'>
      <input type='hidden' name=do value='employee'>
      <input type='hidden' name='companyidform' value='<?php echo $companyid ?>'>
      <tr> 
        <td align='right' valign='top' ><b></b></td>
        <td>Add a contact in the company below, </td>
      </tr>
      <tr> 
        <td align='right' valign='top' class="menus1"><b>Firstname</b></td>
        <td><input type=text name='firstnameform' cols='30' rows='1'> </td>
      </tr>
      <tr> 
        <td align='right' valign='top' class="menus1"><b>Lastname</b></td>
        <td><input type=text name='lastnameform' cols='30' rows='1'> </td>
      </tr>
      <tr> 
        <td align='right' valign='top' class="menus1"><b>username</b></td>
        <td><input type=text name='usernameform' cols='30' rows='1'> </td>
      </tr>
      <tr> 
        <td align='right' valign='top' class="menus1"><b>password</b></td>
        <td><input type=text name='passwordform' cols='30' rows='1'> </td>
      </tr>
      <tr> 
        <td align='right' valign='top' class="menus1"><b>Contacts Telephone</b></td>
        <td><input type=text name='memberphoneform' cols='30' rows='1'> </td>
      </tr>
      <tr> 
        <td align='right' valign='top' class="menus1"><b>Contacts Mobile</b></td>
        <td><input type=text name='membermobileform' cols='30' rows='1'> </td>
      </tr>
      <tr> 
        <td align='right' valign='top' class="menus1"><b>Contacts Fax</b></td>
        <td><input type=text name='memberfaxform' cols='30' rows='1'> </td>
      </tr>
      <tr> 
        <td align='right' valign='top' class="menus1"><b>Contacts Email</b></td>
        <td><input type=text name='memberemailform' cols='30' rows='1'> </td>
      </tr>
      <tr> 
        <td align='right' valign='top' class="menus1"><b>comments</b></td>
        <td><textarea name='membercommentsform' cols='30' rows='1'></textarea> 
        </td>
      </tr>
      <tr> 
        <td colspan='2' align='center'><input name='submit' type='submit' value='Submit Query'></td>
      </tr>
    </table>
  </form>
  <?php
break;
	 
case "passwordwrong" :
	  
	  echo "Your name's not down, you're not coming in.";
	  
break;
	  }
	  ?>
  <? echo "$addedbyform"; ?> </div>
</body>
</html>
