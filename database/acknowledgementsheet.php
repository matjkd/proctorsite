<?php
session_start();
?>
<?php require_once('../property.inc');
if (@$auth != "yes")
{
echo "You can't view this page";
exit();
}
// some variable settings: Even though it says purchase order a lot, thats just a technicallity, might ignore that cos it works

		$title = "Production form";
		$category = "AF";
		if ($formaction=='view')
		{
		$tableaction=$formaction;
		}
		else
		{

		
 if (!isset($tableaction)) $tableaction="createnumber";
 }
 
 
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Acknowledgement Sheet</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="database.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php
	echo "security $seclevel $logname $auth";	
switch ($tableaction)
		{
		case "createnumber":


		//this bit of code gets the last ordernumber from the internal order table, increments
		//it by one, and displays it
		$sql = "SELECT internalordernumber FROM internalorder ORDER BY internalordernumber DESC LIMIT 1";
		$result = mysql_query($sql)
		or die ("unable to get order number");
		$row = mysql_fetch_array($result);
		extract($row);
		
		
		$internalordernumberform = $internalordernumber+1;
				
		
		$date = date("F j, Y, g:i a");
	
		//This code will retrieve the data from the current employee selected on the last page
		$sql2 = "SELECT * FROM clients WHERE companyid='$record'";
		$result2 = mysql_query($sql2)
		or die ("unable to retrieve data");
		$row2 = mysql_fetch_array($result2, MYSQL_ASSOC);
		extract($row2);
		$selectedcompany=$companyname;
		
		break;
		
		case "view":
		$internalordernumberform=$ordernumber;
		$newordernumber=$ordernumber;
		echo "we are trying to view $newordernumber";
		$sql = "SELECT * FROM internalorder WHERE internalordernumber='$newordernumber'";
									$result = mysql_query($sql)
									or die ("failure");
									while ($row = mysql_fetch_array($result))
										{
										extract($row);
										}
										
		$sql2 = "SELECT * FROM clients WHERE companyid='$companyrecord'";
		$result2 = mysql_query($sql2)
		or die ("unable to retrieve data");
		$row2 = mysql_fetch_array($result2, MYSQL_ASSOC);
		extract($row2);
		$selectedcompany=$companyname;
		
		break;
		
		case "firstentry":
				echo "right then $internalordernumberform what......$newordernumber', '$refadd', '$category', '$descriptionadd', '$departmentadd', '$unitcostadd', '$quantityadd'";
				$newordernumber = $internalordernumberform;
				$date = date("F j, Y, g:i a");
				
				
					$query = "INSERT INTO ordertables (tableordernumber, tableref, tablecategory, tabledescription, tableproduction, tablecost, tablequantity) 
							   VALUES ('$newordernumber', '$refadd', '$category', '$descriptionadd', '$departmentadd', '$unitcostadd', '$quantityadd')";
						
					$result = mysql_query($query)
					or die ("error adding data to ordertable");
					echo "table data added successfuly";
					
						
										
						//this checks if alternate client has been added in the other box
		if ($clientnameform=="")
		{

		}
		else
		{
		$clientnameform=$clientnameform;
		}

if ($alternateclientform=="")
		{

		}
		else
		{
		$clientnameform=$alternateclientform;
		}
		//end of checking alternate client field
		
		
		
		if ($deliveryaddressform==NULL)
		{
		$deliveryaddressform="As above";
		}
		
		$query = "INSERT INTO internalorder (internalordernumber, date, clientname, iocompanyname, companyrecord, machine, iointernalcontact, deliverymethod, deliverydate, deliveryaddress, iotitle, orderdescription, iodigital, iovinyl, iomounting, ioproduction, ioinstallation, iosubstrate, iocomments, ioemailto, ioorderref) 
							   VALUES ('$newordernumber', '$datetime', '$clientnameform', '$companynameform', '$companyrecord', '$machineform', '$internalcontactform', '$deliverymethodform', '$deliverydateform', '$deliveryaddressform', '$iotitle', '$descriptionform', '$digitalform', '$vinylform', '$mountingform', '$productionform', '$installationform', '$substrateform', '$iocommentsform', '$alternateemail', '$orderrefform')";
						
		
		$result = mysql_query($query)
				or die ("error adding company '$internalordernumberform', '$datetime', '$clientnameform', '$companynameform', '$companyrecord', '$machineform', '$deliverymethodform', '$deliverydateform', '$deliveryaddressform', '$iotitle', '$descriptionform', '$iocommentsform'");
		
		
		//get data
		$sql = "SELECT * FROM internalorder WHERE internalordernumber='$newordernumber'";
									$result = mysql_query($sql)
									or die ("failure");
									while ($row = mysql_fetch_array($result))
										{
										extract($row);
										}
		
		
		$sql2 = "SELECT * FROM clients WHERE companyid='$record'";
		$result2 = mysql_query($sql2)
		or die ("unable to retrieve data");
		$row2 = mysql_fetch_array($result2, MYSQL_ASSOC);
		extract($row2);
		$selectedcompany=$companyname;
		
				break;
				
				
				case "add":
				echo " hey $newordernumber over here";
				$internalordernumberform=$newordernumber;
						
						$query = "INSERT INTO ordertables (tableordernumber, tableref, tablecategory, tabledescription, tableproduction, tablecost, tablequantity) 
							   VALUES ('$newordernumber', '$refadd2', '$tablecategory', '$descriptionadd2', '$departmentadd2', '$unitcostadd2', '$quantityadd2')";
						
					// delete this if the above work	
					//	$query = "INSERT INTO ordertables (tableordernumber, tableref, tablecategory, tablequantity, tabledescription, tablecost, tableproduction) 
					//		   VALUES ('$newordernumber', '$refadd2', '$tablecategory', '$quantityadd2', '$descriptionadd2', '$unitcostadd2', '$departmentadd2')";
						
					$result = mysql_query($query)
					or die ("error adding data to ordertable");
					echo "table data added successfuly";
					
					$sql = "SELECT * FROM internalorder WHERE internalordernumber='$newordernumber'";
									$result = mysql_query($sql)
									or die ("failure");
									while ($row = mysql_fetch_array($result))
										{
										extract($row);
										}
						break;
						
						
						
						
						case "change":
						$internalordernumberform=$newordernumber;
								$query = "UPDATE ordertables SET tablequantity='$quantitychange', tableref='$refchange', tabledescription='$descriptionchange', tableproduction='$departmentchange', tablecost='$unitcostchange'  WHERE tablenumber='$tablenumber' ";
								$result = mysql_query($query)
								or die ("error changing data1");
								echo "table data changed ";
								
									$sql = "SELECT * FROM internalorder WHERE internalordernumber='$internalordernumberform'";
									$result = mysql_query($sql)
									or die ("failure");
									while ($row = mysql_fetch_array($result))
										{
										extract($row);
										}
										
									
		
				break;
				
				case "change2":
				echo "WHAT WHAT WHAT";
				$query = "UPDATE internalorder SET clientname='$clientform', ioemailto='$alternateemail', orderdescription='$descriptionform',  iointernalcontact='$internalcontactform',
				 deliverymethod='$deliverymethodform', ioorderref='$orderrefform', deliverydate='$deliverydateform',  deliveryaddress='$deliveryaddressform', iotitle='$iotitle',  iocomments='$iocommentsform' WHERE internalordernumber='$internalordernumberform'";
				$result = mysql_query($query)
										or die ("error changing data2222");
										echo "table data altered - $clientname - - $alternateemail - $internalordernumberform";
				
					$sql = "SELECT * FROM internalorder WHERE internalordernumber='$internalordernumberform'";
									$result = mysql_query($sql)
									or die ("failure");
									while ($row = mysql_fetch_array($result))
										{
										extract($row);
										}
										
										$sql3 = "SELECT * FROM clients WHERE companyname='$iocompanyname'";
										$result3 = mysql_query($sql3)
										or die ("error");
										while ($row3 = mysql_fetch_array($result3))
										{
										extract($row3);
										}
				
				break;
				
				case "delete":
								
								$sql = "DELETE FROM ordertables WHERE tablenumber=$tablenumber";
								$result = mysql_query($sql);
								
								echo "delete from ordertables where tablenumber is $tablenumber on $newordernumber";
								
								$internalordernumberform=$newordernumber;
								$sql = "SELECT * FROM internalorder WHERE internalordernumber='$newordernumber'";
									$result = mysql_query($sql)
									or die ("failure");
									while ($row = mysql_fetch_array($result))
										{
										extract($row);
										}
										
										$sql3 = "SELECT * FROM clients WHERE companyname='$iocompanyname'";
										$result3 = mysql_query($sql3)
										or die ("error");
										while ($row3 = mysql_fetch_array($result3))
										{
										extract($row3);
										}
			
			}
			
		
		
		$sql3 = "SELECT * FROM clients WHERE companyname='$iocompanyname'";
										$result3 = mysql_query($sql3)
										or die ("error");
										while ($row3 = mysql_fetch_array($result3))
										{
										extract($row3);
										}
			
			
		
				
 ?>

<form name='Production Sheet'  method='post' action='<?php $PHP_SELF ?>' >
	<input name="option" type="hidden" value="add">
	<input name="companyrecord" type="hidden" value="<?php echo "$record"; ?>">
  <input name="internalordernumberform" type="hidden" value="<?php echo "$internalordernumberform"; ?>">
  <input name="datetime" type="hidden" value="<?php echo "$date"; ?>">
  
<table width="700" border="0" class="border">
  <tr> 
      <td colspan="2" class="formheader" id="blog-title">Acknowledgement Sheet</td>
  </tr>
  <tr> 
    <td class="formtitles">Job No.</td>
    <td class="database"><?php echo "$internalordernumberform"; ?></td>
  </tr>
  <tr> 
    <td class="formtitles"> date:</td>
    <td class="database"> <?php echo $date; ?> </td>
  </tr>
  <tr> 
    <td class="formtitles">Client Name </td>
    <td> 
	<?php if ($tableaction=="view" OR $formaction=="no")
	{
	echo "<input type='text' name='clientform' value='$clientname'>";
	}
	else
	{
	?>
	<select name="clientnameform" size="1" onChange="ldMenu(this.selectedIndex);">
        <?php 
		  $sql = "SELECT * FROM members WHERE memberid='$selectedemployee'";
		$result = mysql_query($sql)
		or die ("can't find employee");
		While ($row = mysql_fetch_array($result))
		{
		extract($row);
		$selectedname="$memberfirstname $memberlastname";
		}
		
		$sql = "SELECT * FROM members WHERE membercompanyid='$record'";
		$result = mysql_query($sql)
		or die ("can't find employees");
		
		While ($row = mysql_fetch_array($result))
		{
		extract($row);
		$fullname="$memberfirstname $memberlastname";
		
		if ($fullname==$selectedname)
		{	
          echo "<option selected>$fullname</option>";
		 }
		 else
		 {
		  echo "<option>$fullname</option>";
		 }
		  }
		  ?>
      </select>
      enter alternate client here -&gt; <input type="text" name="alternateclientform"><?php } ?></td>
  </tr>
  <tr> 
    <td height="28" class="formtitles">Company Name </td>
    <td><input name="companynameform" type="hidden" value="<?php echo"$selectedcompany"; ?>"> 
      <?php echo "$selectedcompany"; ?> </td>
  </tr>
  <tr> 
    <td height="31" class="formtitles">email </td>
    <td><input type="text" name="alternateemail" value="<?php if ($selectedemployee==NULL)
																{
																
																	  
	  																		if ($ioemailto==NULL)
																				{
																				echo $mainemail;
																				$emailto = $mainemail;
																				}
																					else
																					{
																					echo $ioemailto;
																					$emailto = $ioemailto;
																					}
																	
																	
																}
																else
																{
																$sql="SELECT * FROM members WHERE memberid=$selectedemployee";
																$result = mysql_query($sql)
																or die ("can't find employee");
																While ($row = mysql_fetch_array($result))
																	{
																	extract($row);
																	echo $memberemail;
																	}
																
																}
																	
																	
																	?>"></td>
  </tr>
  <!--     <tr> 
      <td class="formtitles">Machine</td>
      <td><select name="machineform">
          <option>HP5000</option>
          <option>Jv3</option>
          <option>Zund</option>
          <option>Vinyl</option>
          <option>Other (subcontract)</option>
        </select></td>
    </tr> -->
  <tr> 
    <td class="formtitles">Internal Contact</td>
    <td><input type="text" name="internalcontactform" value="<?php echo $iointernalcontact; ?>"></td>
  </tr>
  <tr> 
    <td class="formtitles">Delivery Method</td>
    <td><input type="text" name="deliverymethodform" value="<?php echo $deliverymethod; ?>"></td>
  </tr>
  <tr> 
    <td class="formtitles">Delivery Date</td>
    <td><input type="text" name="deliverydateform" value="<?php echo $deliverydate; ?>"></td>
  </tr>
  <tr> 
    <td class="formtitles">Customer PO</td>
    <td><input type="text" name="orderrefform" value="<?php echo $ioorderref; ?>"></td>
  </tr>
  <tr> 
    <td class="formtitles">Delivery Address</td>
    <td><textarea name="deliveryaddressform" cols="50" rows="5"><?php 
	  $deladdress="$address1
$address2
$address3
$address3a
$address4
$postcode"; 
	   $deladdress = str_replace("<BR>", "\r\n", $deladdress);
	  echo $deladdress;																	
	  
	  
	  ?>
	  </textarea></td>
  </tr>
  <tr> 
    <td class="formtitles">Order Title</td>
    <td><input type="text" name="iotitle" value="<?php echo $iotitle; ?>"> </td>
  </tr>
  <tr> 
      <td class="formtitles">Special Instructions</td>
    <td><textarea name="descriptionform" cols="70" rows="5"><?php echo $orderdescription; ?></textarea> 
    </td>
  </tr>
  <tr> 
    <td class="formtitles">internal comments</td>
    <td><textarea name="iocommentsform" cols="70" rows="3" ><?php echo $iocomments; ?></textarea></td>
  </tr>
  <tr> 
    <td colspan="2" class="database"> 
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
		 <td width="85"> ref</td>
            <td width="176"> quantity</td>
          <td width="306">Description</td>
            <td width="52">&nbsp;</td>
            <td width="82">cost</td>
        </tr>
      </table>
      <input type="hidden" name="newordernumber" value="<?php echo $internalordernumberform; ?>"> 
      <input type="hidden" name="tablecategory" value="<?php echo $category; ?>"> 
      <input type="hidden" name="tableordernumber" value="<?php echo $internalordernumberform; ?>"> 
      <input type="hidden" name="tableaction" value="firstentry"> 
	  <input type="hidden" name="formaction" value="no">
	  <table width="700" border="0" cellspacing="0" cellpadding="0" class="database">
        <tr> 
		 <td width="36"  valign="top"><input name="refadd" type="text" size="6"></td>
            <td width="125" valign="top"><input name="quantityadd" type="text" size="6"> 
            </td>
          <td width="447"><textarea name="descriptionadd" type="text" cols="40" rows="3"></textarea></td>
            <td width="36" valign="top">&nbsp;</td>
			<td width="36" valign="top"><input name="unitcostadd" type="text" size="6"></td>
          <td width="92" valign="top"><input type="submit" name="submit" value="add"></td>
		  
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td colspan="2" class="database">&nbsp;</td>
  </tr>
  <tr> 
    <td class="database">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="2" class="database">&nbsp;</td>
  </tr>
</table>





<br>
<?php 

	}
  	else
  	{
	
 ?>
<input type="hidden" name="tableaction" value="change2">
 <input type="hidden" name="formaction" value="no">
<input type="hidden" name="newordernumber" value="<?php echo $newordernumber; ?>">
<input type='submit' name='submit' value='change above information'></form>
<table width="701" border="0" cellspacing="0" cellpadding="0" class="database">
  <tr> 
    <td width="85"> ref</td>
    <td width="176"> quantity</td>
    <td width="306">Description</td>
    <td width="52">&nbsp;</td>
    <td width="82">cost</td>
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
  <input type="hidden" name="newordernumber" value="<?php echo $internalordernumberform; ?>">
  <input name="record" type="hidden" value="<?php echo $record; ?>">
  <input type="hidden" name="tablecategory" value="<?php echo $category; ?>">
  <input type="hidden" name="tableordernumber" value="<?php echo $internalordernumberform; ?>">
  <input name="tablenumber" type="hidden" value="<?php echo $tablenumber; ?>">
  <input type="hidden" name="tableaction" value="change">
   <input type="hidden" name="formaction" value="no">
  <table width="700" border="0" cellspacing="0" cellpadding="0" class="database">
    <tr> 
	 <td width="36"  valign="top"><input name="refchange" type="text" size="6" value="<?php echo $tableref;?>"></td>
      <td width="125" valign="top"><input name="quantitychange" type="text" size="6" value="<?php echo $tablequantity;?>"> 
      </td>
      <td width="447"><textarea name="descriptionchange" type="text" cols="40" rows="3"><?php echo $tabledescription;?></textarea></td>
      <td width="36" valign="top">&nbsp;</td>
      <td width="36" valign="top"><input name="unitcostchange" type="text" size="6" value="<?php echo $tablecost;?>"></td>
      <td width="71" valign="top"><input type="submit" name="Submit22" value="Change"></td>
      <td width="29" valign="top"><div align="right"><a href="<?php echo "$PHP_SELF?tableaction=delete&&category=$category&&tablenumber=$tablenumber&&record=$record&&newordernumber=$internalordernumber"; ?>"> 
          <img src="graphics/delete.gif" width="10" height="10" border="0"></a> 
        </div></td>
    </tr>
  </table>
</form>
<?php } ?>
<form action='<?php $PHP_SELF ?>'  method='post' name='subtableadd'>
  <input type="hidden" name="newordernumber" value="<?php echo $internalordernumberform; ?>">
  <input name="record" type="hidden" value="<?php echo "$record"; ?>">
  <input type="hidden" name="tablecategory" value="AF">
  <input type="hidden" name="tablepurchaseordernumber" value="<?php echo $internalordernumberform; ?>">
  <input type="hidden" name="tableaction" value="add">
     <input type="hidden" name="formaction" value="no">
  <table width="700" border="0" cellspacing="0" cellpadding="0" class="database">
    <tr> 
      <td width="36"  valign="top"><input name="refadd2" type="text" size="6"></td>
      <td width="125" valign="top"><input name="quantityadd2" type="text" size="6"></td>
      <td width="447"><textarea name="descriptionadd2" type="text" cols="40" rows="3"></textarea></td>
      <td width="36" valign="top">&nbsp;</td>
      <td width="36" valign="top"> <input name="unitcostadd2" type="text" size="6"></td>
      <td width="92" valign="top"><input type="submit" name="Submit2" value="Add"></td>
    </tr>
  </table>
 
</form>

        
<p>
  <?php } ?>
</p>
<table width='700' border='0' cellpadding='0' cellspacing='0' class='border' >
  <tr valign="middle"> 
    <td width='43' height="37"> 
      <?php
    
	echo "<a href='names.php?page=$companyrecord$record'>home</a>";
	?>
    </td>
    <td width='217'><?php echo "<a href='$PHP_SELF?record=$companyrecord$record'>add record using this client</a>
   
    <td width='88'> ";
	
	?></td>
    <td width='115'> 
      <?php
 
 //next and previous buttons, records arent all there
	
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
							echo "<a href='$PHP_SELF?ordernumber=$internalordernumber&&formaction=view'><img src='graphics/previous.gif'></a> ";
							$x=0;
							$y=0;
							}
				
				If ($internalordernumber==$internalordernumberform)
						{
						$x=1;
						}
						else
						{
						
						//this bit is for when the current record doesnt actually exsist inthe database cos it aint been added yet.
						$norecord=$newinternalordernumber-1;
						If ($internalordernumber==$norecord & $y==1)
								{
								echo "<a href='$PHP_SELF?ordernumber=$internalordernumber&&formaction=view'><img src='graphics/previous.gif'></a> ";
								}
						}
							
			
			}
	//end of previous button
	?>
    </td>
    <td width="126"> 
      <?php
	
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
							echo "<a href='$PHP_SELF?ordernumber=$internalordernumber&&formaction=view'><img src='graphics/next.gif'></a> ";
							$x=0;
							}
				
				If ($internalordernumber==$internalordernumberform)
						{
						$x=1;
						}
						else
						{
						
						}
							
			
			}
			
	//end of next button
	
	?>
    </td>
    <td width="101"> 
      <?php 
 

	
	?>
    </td>
    <td width="46"> 
      <?php
	if ($formaction=="view" OR $formaction="no")
 {
 echo "<a href=ackreport2.php?internalordernumber=$newordernumber target='_blank'>Print acknowledgement</a><BR>
 <BR><a href=emailack.php?internalordernumber=$newordernumber target='_blank'>email acknowledgement to $ioemailto</a> <BR><BR>
 <BR><a href=deliveryreport.php?internalordernumber=$newordernumber target='_blank'>Print delivery report</a><BR>
 <BR><a href=installationreport.php?internalordernumber=$newordernumber target='_blank'>Print installation report</a><BR>
 <BR><a href=productionsheet2.php?ordernumber=$internalordernumberform&&formaction=view target='_blank'>production sheet</a>";
 ?>
    </td>
    <td width="50"> 
      <?php	if ($seclevel==1)
	{	
 //	echo "<a href='internalordersend.php?option=delete&&record=$internalordernumberform'><img src='graphics/delete.gif' height=25 alt='DELETE'></a><BR>";
	}
 }
 ?>
    </td>
  </tr>
</table>
</body>
</html>
