<?php
	include "odsms_config.php";
	$sql="DELETE FROM store where storeid='$_GET[id]'";
	if ($conn->query($sql))
	header("location:manage-stores.php");
	else
	echo "error";
?>