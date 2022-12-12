<?php
	include "odsms_config.php";
	session_start();
	unset($_SESSION["sm_username"]);
	 if(session_destroy()) {
	header("Location:mainpage.php");
	}
?>