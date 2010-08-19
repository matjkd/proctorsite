<?php
session_start();
session_register('auth');
session_register('logname');
include('property.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="file:///E|/current%20work/proimaging%20website/matsadler.css" rel="stylesheet" type="text/css">
<link href="file:///E|/current%20work/proimaging%20website/pilcss3.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
/* This is the login program */
$sql = "SELECT username FROM membersdb WHERE username='$fusername'";
$result = mysql_query($sql)
	or die("why me? why me?");
$num = mysql_num_rows($result);
if ($num == 1) // login was found
{
	$sql = "SELECT username FROM membersdb WHERE username='$fusername' AND memberpassword='$fmemberpassword'";
	$result2 = mysql_query($sql)
		or die("error, contact administrator");
	$num2 = mysql_num_rows($result2);
	if ($num2 > 0)  //password is correct
	{
		$auth="yes";
		$logname=$fusername;
		$today= date("Y-m-d H:i:s");
		$sql = "INSERT INTO login (username, logintime)
				VALUES ('$logname', '$today')";
		mysql_query($sql) or die ("failure to add login details");
		$sql = "SELECT * FROM membersdb WHERE username='$logname'";
		$result = mysql_query($sql)
				or die("error");
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		extract($row);
		
		echo "<div class='maintext1'> $fusername. You are logged in<BR><BR>
		<a href='index.php'>Click here to continue</a><BR><BR>
		
		<a href='database/names.php'>database</a><BR><BR>
		
		
		</div>
		
		
 
			  
			  
           
			
			
			 
			" ;
	}
		else // password is WRONG
		{
		echo "the username, '$fusername' exists, but you got the password wrong.";
		}
	}
	elseif ($num == 0) // login name not found
	{
		echo "Login not found";
	}

?>
</body>
</html>
