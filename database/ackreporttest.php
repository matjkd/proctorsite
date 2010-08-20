<?php
session_start();
?>
<?php require_once('../property.inc'); 
if (@$auth != "yes")
{
echo "You can't view this page";
exit();
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Acknowledgement</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="reports.css" rel="stylesheet" type="text/css">
<script>
function printPage()
{
window.print()
}


</script>
</head>

<body>
<?php require_once('ackinctest.php'); ?>


<script>
printPage()


</script>

</body>

</html>
