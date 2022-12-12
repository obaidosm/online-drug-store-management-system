<?php
	include "odsms_config.php";
	$sql="DELETE FROM medicine where medid='$_GET[id]'";
	
	if ($conn->query($sql))
	header("location:managemedicinefromadmin.php");
	else
	echo "error";
?>