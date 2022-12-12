<?php
	include "odsms_config.php";
	$sql1="DELETE FROM saleitem where saleid='$_GET[slid]' and medid='$_GET[mid]'";
	$sql2="SELECT totprice , storeid FROM saleitem where saleid='$_GET[slid]' and medid='$_GET[mid]'";
	$tot=$conn->query($sql2);
	$tott=$tot->fetch_row();
	$totp=$tott[0];
	$stid=$tott[1];
	
	$sql="INSERT INTO returns (saleid,storeid, medid , tr_amount) VALUES ($_GET[slid] ,$stid, $_GET[mid] , '$totp')";
	if ($conn->query($sql) && $conn->query($sql1) && '$_GET[slid]') {
	header("location:por.php?sid=$_GET[slid]");
	exit();
	}
	else
	echo "Error";
?>

