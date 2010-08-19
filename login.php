<?php
session_start();
session_register('auth');
session_register('logname');
?>
<?php require_once('property.inc'); 

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="matsadler.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
/* This is the login program */
$sql = "SELECT username FROM members WHERE username='$fusername'";
$result = mysql_query($sql)
	or die("why me? why me?");
$num = mysql_num_rows($result);
if ($num == 1) // login was found
{
	$sql = "SELECT username FROM members WHERE username='$fusername' AND memberpassword='$fmemberpassword'";
	$result2 = mysql_query($sql)
		or die("bollocks, there is a problem");
	$num2 = mysql_num_rows($result2);
	if ($num2 > 0)  //password is correct
	{
		$auth="yes";
		
setcookie("yes", $auth);
		$logname=$fusername;
		$today= date("Y-m-d H:i:s");
		$sql = "INSERT INTO login (username, logintime)
				VALUES ('$logname', '$today')";
		mysql_query($sql) or die ("whoops");
		$sql = "SELECT * FROM members WHERE username='$logname'";
		$result = mysql_query($sql)
				or die("oh");
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		extract($row);
		
		echo "welcome $fusername, you is wicked.<BR><BR>
		
		
 <table width='95%' border='0' cellspacing='3' cellpadding='1'>
              <tr class='maintext1'> 
                <td width='30%' valign='top' >name</td>
                <td width='81%' valign='top'>$name</td>
                <td width='81%' valign='top' rowspan='9'>&nbsp;
<script language='JavaScript' type='text/javascript' >
    <!--
	//random image display
	//write function to link thumbnail to full size image in future
	x = Math.floor(Math.random()*$numberofthumbs)
    	document.write('<IMG SRC=http://www.matsadler.com/PIGS/pictures/thumbnails/')
    	document.write('$image')
    	document.write(x)
    	document.write('-01.jpg')
    	document.write('>')

    // -->
</script>

</td>
              </tr>
              <tr class='maintext1'> 
                <td valign='top'>position</td>
                <td valign='top'>$position</td>
              </tr>
              <tr class='maintext1'> 
                <td valign='top'>email</td>
                <td valign='top'><a href='mailto:$email'><font color=#999999>$email</font></a></td>
              </tr>
             
			  <tr class='maintext1'> 
                <td valign='top'>website</td>
                <td valign='top'><a href='$website'><font color=#999999>$website</font></a></td>
              </tr>
			  
			  <tr class='maintext1'> 
                <td valign='top'>address 1</td>
                <td valign='top'>$address1</td>
              </tr>
			  
			  <tr class='maintext1'> 
                <td valign='top'>address 2</td>
                <td valign='top'>$address2</td>
              </tr>
			  
			  <tr class='maintext1'> 
                <td valign='top' >County</td>
                <td valign='top'>$county</td>
              </tr>
			  
			  <tr class='maintext1'> 
                <td valign='top' >Postcode</td>
                <td valign='top'>$postcode</td>
              </tr>
			  
			  <tr class='maintext1'> 
                <td valign='top' >Country</td>
                <td valign='top'>$country</td>
              </tr>
			  
			  
            </table><BR><BR>
			
			If the above information is incorrect, or you want any of it removed contact me at
			 <a href='mailto:me@matsadler.com'><font color='#999999'>me@matsadler.com</font></a>. It won't get passed on anywhere, and all that.
			 Soon you will be able to edit your own info as you wish, except for the top secret stuff we keep on you.<BR><BR>
			 
			 Details like your address(if we have it) are not put up in public parts of the site by the way, they are for our records only
			 <BR><BR><BR>
			 
			" ;
	}
		else // password is WRONG
		{
		echo "the username, '$fusername' exists, but you got the password wrong.";
		}
	}
	elseif ($num == 0) // login name not found
	{
		echo "you're no PIG";
	}

?>
</body>
</html>