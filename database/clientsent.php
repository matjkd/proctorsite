<?php
session_start();

 require_once('property.inc');
 if (@$auth != "yes")
{
echo "You can't view this page";
exit();
}
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

</head>

<body>
<?php




//inserts the client data into the two forms, one for the company, and one for the employees, 
//allowing multiple employees per company

if ($do == "add")  
{

//looks for duplicates
$sql="SELECT * FROM clients WHERE companyname='$companynameform'";
 $result = mysql_query($sql)
		 or die ("error.");
		 $x=0;
		while ($row = mysql_fetch_array($result))
		
			{
				extract($row);
				$x=$x+1;
			
				}
					if ($x==1)
					{
					echo "The company $companynameform already exsists in the database. <BR>";
					}
		$fullname = "$firstnameform $lastnameform";
		$random = (rand()%1000);
		
		//if the companyname is NULL then the name of the employee becomes the company name
		if (!isset($companynameform))
		{
		$companynameform = $fullname;
		}
		else
		{
		$companynameform = $companynameform;
		}
		
		//$companycommentsform = str_replace("\r\n","<BR>",$companycommentsform);
		//$membercommentsform = str_replace("\r\n","<BR>",$membercommentsform);
		
		$query = "INSERT INTO clients (clientcategory, companyname, address1, address2, address3, address3a, address4, postcode, maintel, mainfax, mainemail, clientcomments) 
							   VALUES ('$categoryform', '$companynameform', '$address1form', '$address2form', '$address3form', '$address3aform', '$address4form', '$postcodeform', '$phoneform', '$faxform', '$emailform', '$companycommentsform')";
						
		
		$result = mysql_query($query)
				or die ("error adding company");
		echo "well $companynameform has been added
		<BR>
		";
		
// I need to add a query that somehow gets the company id that hasnt been made yet of the compnay i'm entering, i'm not sure what i just wrote means anyhthing
		$query = "SELECT * FROM clients WHERE companyname='$companynameform'";
			$result = mysql_query($query)
			 or die ("it was a long shot..");
			 $row = mysql_fetch_array($result, MYSQL_ASSOC);
			extract($row);
		//if the username isnt set, this sets it as the fullname of the client	 
		if (isset($usernameform))
		{
		$usernameform = "$fullname$random";
		}
		else
		{
		$usernameform = $usernameform;
		}
		
		//when no member data is entered it enters a blank entry, so I'm putting in a simple if statement here
		if ($firstnameform==NULL AND $lastnameform==NULL)
		{
		}
		else
		{
		
		$query = "INSERT INTO members (membercompanyid, name, username, memberpassword, memberfirstname, memberlastname, membertelephone, membermobile, memberfax, memberemail, membercomments)
								VALUES ('$companyid', '$fullname', '$usernameform', '$passwordform', '$firstnameform', '$lastnameform', '$memberphoneform', '$membermobileform', '$memberfaxform', '$memberemailform', '$membercommentsform')";
							   
		$result = mysql_query($query)
				or die ("error adding employees");
				echo "$companyid <---
				<BR>
		Click <a href='names.php?page=$companyid'>here!!!!</a> to continue";
		}
		?>
		
		<script>


function browserRedirect()
{
  var ns4 = document.layers;
  var ns6 = document.getElementById && !document.all;
  var ie4 = document.all;
  
  if(ns4) URLStr = "<?php echo "names.php?page=$companyid"; ?>";
  else if(ns6) URLStr = "<?php echo "names.php?page=$companyid"; ?>";
  else if(ie4) URLStr = "<?php echo "names.php?page=$companyid"; ?>";
  else URLStr = "<?php echo "names.php?page=$companyid"; ?>";
  location = URLStr;
}




</script>
		
		
		 <script>browserRedirect();</script>
		
				
				
		<?php		
				
}
if ($do == "change") 


{

$queryadd = "UPDATE purchaseorder SET porecord='$companyidform' WHERE pocompanyname='$oldcompanyname'";
$resultadd = mysql_query($queryadd)
		or die("error adding company number to purchase ordertable");
	
	

	
		$query = "UPDATE clients SET clientcategory='$categoryform', companyname='$companynameform', address1='$address1form', address2='$address2form',
				address3='$address3form', address3a='$address3aform', address4='$address4form', postcode='$postcodeform', maintel='$phoneform', mainfax='$faxform', mainemail='$emailform', clientcomments='$companycommentsform' WHERE companyid='$companyidform'";
		$result = mysql_query($query)
			or die ("error changing client info");
			echo "
		Click <a href='names.php?page=$companyidform'>here</a> to continue...";
			
}
if ($do == "employee") 
{

$fullname = "$firstnameform $lastnameform";
$random = (rand()%1000);
if (isset($usernameform))
{
$usernameform = "$fullname$random";
}
else
{
$usernameform = $usernameform;
}




$query2 = "INSERT INTO members (membercompanyid, name, username, memberpassword, memberfirstname, memberlastname, membertelephone, membermobile, memberemail, membercomments)
								VALUES ('$companyidform', '$fullname', '$usernameform', '$passwordform', '$firstnameform', '$lastnameform', '$memberphoneform', '$membermobileform', '$memberemailform', '$membercommentsform')";
							   
		$result3 = mysql_query($query2)
				or die ("error error");
			echo "Click <a href='names.php?page=$companyidform'>here</a> to continue............";

}
if ($do == "changeemployee")
{
$fullname = "$memberfirstnameform $memberlastnameform";
$query = "UPDATE members SET username='$usernameform', name='$fullname', memberpassword='$memberpasswordform', memberfirstname='$memberfirstnameform', memberlastname='$memberlastnameform', membertelephone='$membertelephoneform', membermobile='$membermobileform',
		 memberemail='$memberemailform', membercomments='$membercommentsform' WHERE memberid='$memberidform'";
		$result = mysql_query($query)
			or die ("error changing client info");
			echo "
		Click <a href='names.php?page=$companyidform'>here</a> to continue...........";
}
?>
		
		<script>


function browserRedirect2()
{
  var ns4 = document.layers;
  var ns6 = document.getElementById && !document.all;
  var ie4 = document.all;
  
  if(ns4) URLStr = "<?php echo "names.php?page=$companyidform"; ?>";
  else if(ns6) URLStr = "<?php echo "names.php?page=$companyidform"; ?>";
  else if(ie4) URLStr = "<?php echo "names.php?page=$companyidform"; ?>";
  else URLStr = "<?php echo "names.php?page=$companyidform"; ?>";
  location = URLStr;
}




</script>
		
		
		 <script>browserRedirect2();</script>
		
				
				
		


</body>
</html>
