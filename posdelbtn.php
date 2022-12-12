<?php
	include "odsms_config.php";
	$sql="DELETE FROM saleitem where saleid='$_GET[slid]' AND medid='$_GET[mid]'";
	if ($conn->query($sql)){
	header("location:pos-sales.php");
	exit();
	}
	else
	echo "Error";
?>


