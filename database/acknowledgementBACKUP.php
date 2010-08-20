<?php
session_start();
?>
<?php require_once('../property.inc'); 
if (@$auth != "yes")
{
echo "You can't view this page";
exit();
}
// some variable settings:

		$title = "Acknowledgement Table";
		$category = "AF";
		$ordernumber = "purchaseordernumber";
		$table = "purchaseorder";
		if (!isset($tableaction)) $tableaction="firstentry";
		?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<script>
function printPage() { print('internalorderreport.php'); }


function ClipBoard() 
{
holdtext.innerText = copytext.innerText;
Copied = holdtext.createTextRange();
Copied.execCommand("RemoveFormat");
Copied.execCommand("Copy");
}


</script>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="database.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
		// "Order Form 0.1", a work of unreadable genius by Mat Sadler, king of overcomplicated code writing
		// Don't ask me how it works, I'm an amature, and I blame the coffee. 
		// Copyright (c) 2005 Matthew Sadler if you can make sense of it all, feel free to modify it.
		// Any comments or abuse send to gnu@matsadler.com
		// This program is free software; you can redistribute it and/or
		// modify it under the terms of the GNU General Public License
		// as published by the Free Software Foundation; either version 2
		// of the License, or (at your option) any later version.

		// This program is distributed in the hope that it will be useful,
		// but WITHOUT ANY WARRANTY; without even the implied warranty of
		// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
		// GNU General Public License for more details.

		// the below section adds the data to the database, or changes it, depending on what part of the table we were at before
		// using a switch.
		
		switch ($tableaction)
		{
		case "createnumber":
		
		
		
		//  number needs to be changed to whatever the field is called in the table we are extracting the data from
		$newordernumber = $internalordernumber;
		$date = date("F j, Y, g:i a");
		
		
		
		break;
		
		
				case "firstentry":
				//echo "firstentry";
				$newordernumber = $internalordernumber;
				$date = date("F j, Y, g:i a");
				if ($quantityadd==NULL)
				{
				}
				else
				{
				
					$query = "INSERT INTO ordertables (tableordernumber, tablecategory, tablequantity, tabledescription, tablecost) 
							   VALUES ('$purchaseordernumberform', '$category', '$quantityadd', '$descriptionadd', '$unitcostadd')";
						
					$result = mysql_query($query)
					or die ("error adding data to ordertable");
					echo "table data added successfuly";
					
						$sql = "SELECT * FROM purchaseorder WHERE purchaseordernumber='$newordernumber'";
									$result = mysql_query($sql)
									or die ("failure");
									while ($row = mysql_fetch_array($result))
										{
										extract($row);
										}
				}
				break;
		
						case "add":
						$query = "INSERT INTO ordertables (tableordernumber, tablecategory, tablequantity, tabledescription, tablecost) 
							   VALUES ('$newordernumber', '$category', '$quantityadd', '$descriptionadd', '$unitcostadd')";
						
					$result = mysql_query($query)
					or die ("error adding data to ordertable");
					echo "table data added successfuly";
					
					$sql = "SELECT * FROM purchaseorder WHERE purchaseordernumber='$newordernumber'";
									$result = mysql_query($sql)
									or die ("failure");
									while ($row = mysql_fetch_array($result))
										{
										extract($row);
										}
						break;
		
								case "change":
								$query = "UPDATE ordertables SET tablequantity='$quantitychange', tabledescription='$descriptionchange', tablecost='$unitcostchange' WHERE tablenumber='$tablenumber' ";
								$result = mysql_query($query)
								or die ("error changing data1");
								echo "purchase info changed ";
								
										$query = "UPDATE purchaseorder SET clientname='$clientnameform', ponotes='$ponotesform', popayment='$paymentform' WHERE $ordernumber='$newordernumber'  ";
										$result = mysql_query($query)
										or die ("error changing data2");
										echo "table data altered";
										
										$sql = "SELECT * FROM purchaseorder WHERE purchaseordernumber='$newordernumber'";
									$result = mysql_query($sql)
									or die ("failure");
									while ($row = mysql_fetch_array($result))
										{
										extract($row);
										}
								break;
								
								
								case "delete":
								
								$sql = "DELETE FROM ordertables WHERE tablenumber=$tablenumber";
								$result = mysql_query($sql);
								
								echo "delete from ordertables where tablenumber is $tablenumber";
								
								$internalordernumber=$newordernumber;
								$sql = "SELECT * FROM purchaseorder WHERE purchaseordernumber='$newordernumber'";
									$result = mysql_query($sql)
									or die ("failure");
									while ($row = mysql_fetch_array($result))
										{
										extract($row);
										}
								
								break;
								
									case "view":
									 $sql = "SELECT * FROM purchaseorder WHERE purchaseordernumber='$newordernumber'";
									$result = mysql_query($sql)
									or die ("failure");
									while ($row = mysql_fetch_array($result))
										{
										extract($row);
										}
										
										$sql = "SELECT * FROM clients WHERE companyname='$iocompanyname'";
										$result = mysql_query($sql)
										or die ("error");
										while ($row = mysql_fetch_array($result))
										{
										extract($row);
										$record=$companyid;
										}
									break;
		}

		

		//This code will retrieve the data from the current employee selected on the last page
		$sql2 = "SELECT * FROM internalorder WHERE internalordernumber='$newordernumber'";
		$result2 = mysql_query($sql2)
		or die ("unable to retrieve data");
		$row2 = mysql_fetch_array($result2, MYSQL_ASSOC);
		extract($row2);
		
		$sql3 = "SELECT * FROM clients WHERE companyname='$iocompanyname'";
										$result3 = mysql_query($sql3)
										or die ("error");
										while ($row3 = mysql_fetch_array($result3))
										{
										extract($row3);
										}
 ?>
 
<SPAN ID="copytext" STYLE="height:12;width:162;">
<?php 
echo "$mainfax"; ?>
</SPAN> 
<TEXTAREA rows="1" ID="holdtext" STYLE="display:none;">
</TEXTAREA>
<SCRIPT>ClipBoard();</SCRIPT>

<form action='<?php $PHP_SELF ?>'  method='post' name= '$PHP_SELF' >
	<input name="record" type="hidden" value="<?php echo "$record"; ?>">
  <input name="acknumberform" type="hidden" value="<?php echo $newordernumber; ?>">
  <input name="datetime" type="hidden" value="<?php echo $date; ?>">
   <input name="companynameform" type="hidden" value="<?php echo $companyname; ?>">
  <table width="700" border="0" class="border">
    <tr> 
      <td colspan="2" class="formheader" id="blog-title"><?php echo "$title"; ?></td>
    </tr>
    <tr> 
      <td class="formtitles">Order No.</td>
      <td  class="database"><?php echo "$newordernumber"; ?></td>
    </tr>
    <tr> 
      <td  class="formtitles">date </td>
      <td class="database"> <?php echo $date; ?></td>
    </tr>
    <tr> 
      <td class="formtitles">Client Name </td>
      <td> 
        <?php 
		
		echo $clientname;
		  ?>
      </td>
    </tr>
    <tr> 
      <td class="formtitles">Company Name </td>
      <td class="database"><?php echo $iocompanyname; ?></td>
    </tr>
    <tr>
      <td class="formtitles">email</td>
      <td class="database"><input type="text" name="alternateemail2" value="<?php if ($poemailto==NULL)
																	{
																	echo $mainemail;
																	$emailto = $mainemail;
																	}
																	else
																	{
																	echo $poemailto;
																	$emailto = $poemailto;
																	} ?>"></td>
    </tr>
    <tr> 
      <td class="formtitles">description from internal order</td>
      <td class="database"> 
        <?php 
	  $orderdescription = str_replace("\r\n","<BR>",$orderdescription);
	  
	  echo $orderdescription; ?>
      </td>
    </tr>
  </table>
 
  <?php // this shows the first instance of the entry table if nothing has been added yet, 
  		// if the tableaction variable hasnt been set we have got to this page from an external link, by clicking add it sets the variable to something
		// depending on where we are in the code. The reason there are 3 instances of the table for adding data is because:
		// When we first get to the page, nothing has been added to any tables anywhere, so the first add button is a combination of adding the 
		// client details to the purchase order table, and adding the first line of orders to the ordertable table (the ordertable table 
		// contains orders from purchase order, invoice's, or any other table, it has a category field and is linked by the order number).
		// It then reloads the page, 
		// now simply extracting the client details, and the first line of orders, and putting that first line in a small form with a change button instead of
		// add button, and below that, a new seperate form with add again. I'm rubbish of explaining things and I'm now bored of typing.
  
  if ($tableaction=="createnumber") 
  {
  ?>
   
   <table width="701" border="0" cellspacing="0" cellpadding="0" class="database">
     <tr> 
      <td width="68">
      
        Quantity</td>
      <td width="515">Description</td>
      <td width="56">Unitcost</td>
      <td width="40">&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="newordernumber" value="<?php echo $newordernumber; ?>">
   <input type="hidden" name="tablecategory" value="<?php echo $category; ?>">
   <input type="hidden" name="tableordernumber" value="<?php echo $newordernumber; ?>">
  <input type="hidden" name="tableaction" value="firstentry">
  <table width="700" border="0" cellspacing="0" cellpadding="0" class="database">
    <tr> 
      <td width="36"><input name="quantityadd" type="text" size="6"> </td>
      <td width="492"><input name="descriptionadd" type="text" value="" size="80"></td>
      <td width="48"><input name="unitcostadd" type="text" size="6"></td>
      
	  
	  <td width="124"><input type="submit" name="submit" value="add"></td>
    </tr>
  </table>
  
  </form>
  <?php }
  else
  {
 ?>
 <input type="hidden" name="tableaction" value="change">
 <input type="hidden" name="newordernumber" value="<?php echo $newordernumber; ?>"></form> 
<table width="700" border="0" cellspacing="0" cellpadding="0" class="database">
     <tr> 
      <td width="57">
      
        Quantity</td>
      <td width="503">Description</td>
      <td width="94">Unitcost</td>
      <td width="46">&nbsp;</td>
    </tr>
  </table>
 <?php
  
  
  //This selects all existing entrys in the ordertable table with the current order number and lists them 
  //in a form with a change button
    $sql="SELECT * FROM ordertables WHERE tableordernumber=$newordernumber AND tablecategory='$category'"; 
    $result = mysql_query($sql)
  	or die ("accessing ordertable error");
	while ($row = mysql_fetch_array($result))
			{
			extract($row);
			$xy="yes";
   ?>
  
  <form action='<?php $PHP_SELF ?>'  method='post' name= 'subtablechange'>
  <input type="hidden" name="ponotesform" value="<?php echo $ponotes; ?>">
  
  <input type="hidden" name="newordernumber" value="<?php echo $newordernumber; ?>">
  <input name="record" type="hidden" value="<?php echo $record; ?>">
  <input type="hidden" name="tablecategory" value="<?php echo $category; ?>">
  <input type="hidden" name="tableordernumber" value="<?php echo $newordernumber; ?>">
 <input name="tablenumber" type="hidden" value="<?php echo $tablenumber; ?>">
  <input type="hidden" name="tableaction" value="change">
  
  <table width="700" border="0" cellspacing="0" cellpadding="0" class="database">
    <tr> 
      <td width="36"><input name="quantitychange" type="text" size="6" value="<?php echo $tablequantity;?>"> 
      </td>
      <td width="492"><input name="descriptionchange" type="text" value="<?php echo $tabledescription;?>" size="80"></td>
      <td width="48"><input name="unitcostchange" type="text" size="6" value="<?php echo $tablecost;?>" ></td>
      <td width="74"><input type="submit" name="Submit22" value="Change"></td>
      <td width="50"><div align="right"><a href="<?php echo "$PHP_SELF?tableaction=delete&&category=$category&&tablenumber=$tablenumber&&record=$record&&newordernumber=$internalordernumber"; ?>"> 
          <img src="graphics/delete.gif" width="10" height="10" border="0"></a> 
        </div></td>
    </tr>
  </table>
</form>
<?php } ?>
  
  <form action='<?php $PHP_SELF ?>'  method='post' name= 'subtableadd'>
  <input type="hidden" name="newordernumber" value="<?php echo $newordernumber; ?>">
  <input name="record" type="hidden" value="<?php echo "$record"; ?>">
  <input type="hidden" name="tablecategory" value="PO">
   <input type="hidden" name="tablepurchaseordernumber" value="<?php echo $newordernumber; ?>">
  <input type="hidden" name="tableaction" value="add">
  <table width="700" border="0" cellspacing="0" cellpadding="0" class="database">
    <tr> 
      <td width="36"><input name="quantityadd" type="text" size="6"> </td>
      <td width="492"><input name="descriptionadd" type="text" value="" size="80"></td>
      <td width="48"><input name="unitcostadd" type="text" size="6"></td>
      <td width="124"><input type="submit" name="Submit2" value="Add"></td>
    </tr>
  </table>
</form>
<table width="700" border="0" cellpadding="0" cellspacing="0" class="border">
  <tr>
    <td><div align="center">Make sure you click add or change before attempting 
        to print. You can only change one line at a time. 
     <br>
        <?php } ?>
        <?php 

echo "
<a href='names.php?page=$companyrecord'>home</a><BR>
<a href='internalorder.php?ordernumber=$newordernumber&&formaction=view'>Back to internal order form</a><BR>
<a href=internalorderreport.php?internalordernumber=$newordernumber target='_blank'>Print internal order sheet</a><BR><BR>
";
if ($xy=="yes")
{
echo "<a href=ackreport.php?internalordernumber=$newordernumber target='_blank'>Print acknowledgement</a> <BR><BR>

<a href=emailack.php?internalordernumber=$newordernumber target='_blank'>email acknowledgement to $mainemail</a> <BR><BR>

<a href=deliverynote.php?internalordernumber=$newordernumber target='_blank'>Print delivery note</a><BR><BR>";

}
  
	/* //next and previous buttons, records arent all there. not needed on acknowledgement form
	
	//previous button  working 
			$sql = "SELECT * FROM internalorder ORDER BY internalordernumber DESC";
		 
		  $result = mysql_query($sql)
		  	or die ("error opening client database");
			
			$x=0;
			$y=1;
			
		while ($row = mysql_fetch_array($result))
			{
				
				extract($row);
				If ($x==1)
							{
							echo "<a href='$PHP_SELF?newordernumber=$internalordernumber&&tableaction=view'>previous</a> ";
							$x=0;
							$y=0;
							}
				
				If ($internalordernumber==$newordernumber)
						{
						$x=1;
						}
						else
						{
						
						//this bit is for when the current record doesnt actually exsist inthe database cos it aint been added yet.
						$norecord=$newordernumber-1;
						If ($internalordernumber==$norecord & $y==1)
								{
								echo "<a href='$PHP_SELF?newordernumber=$internalordernumber&&tableaction=view'>previous</a> ";
								}
						}
							
			
			}
	//end of previous button
	
	//Next button
			$sql = "SELECT * FROM internalorder ORDER BY internalordernumber";
		 
		  $result = mysql_query($sql)
		  	or die ("error opening client database");
			
			$x=0;
			
		while ($row = mysql_fetch_array($result))
			{
				
				extract($row);
				If ($x==1)
							{
							echo "<a href='$PHP_SELF?newordernumber=$internalordernumber&&tableaction=view'>next</a> ";
							$x=0;
							}
				
				If ($internalordernumber==$newordernumber)
						{
						$x=1;
						}
						else
						{
						
						}
							
			
			}
			//echo "<BR><BR><a href='$PHP_SELF?record=$companyid'>add record using this client</a>";
	//end of next button */
	
	?>
      </div></td>
  </tr>
</table>
</html>
