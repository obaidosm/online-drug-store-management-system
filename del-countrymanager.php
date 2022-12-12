<?php
	include "odsms_config.php";
	$sql="DELETE FROM employee where userid='$_GET[id]'";
	if ($conn->query($sql))
	header("location:managecountrymanagers.php");
	else
	echo "error";
?>