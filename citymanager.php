<html>
<head>

<title>
	Dashboard
</title>

</head>

<style>

body{
	font-family:Arial;
}

.topnav {
  background-color: #003366;
  width: 100%;
  height:9%;
  position: fixed;
  x-index: 1;
  top: 0;
  left: 0;
  padding-bottom:10px;
  color:white;
}

.topnav h1{
	position:absolute; top:0px; left:25px;
}


.topnav a {
  float: right;
  text-align: center;
  padding: 25px 25px;
  text-decoration: none;
  font-size: 20px;
  color: yellow;
  display: block;
  border: none;
  background: none;
  cursor: pointer;
  outline: none;
}

.topnav a:hover{
  color:white;
  border: 1px double #f1f1f1;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

.head {
	width:78%;
	background-color:#e6e6e6;
	color:#003366;
	float:right;
	margin-top:80px;
	margin-right:53px;
	margin-left:0px;
	top: 0;
	right: 0;
	overflow:hidden;
}


.sidenav {
  height: 100%;
  width: 15%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #003366;
  padding-top: 10px;
  padding-left:5px;
  font-family:Arial;
  margin-top: 75px;
}


.sidenav a {
  padding: 6px 8px 6px 6px;
  text-decoration: none;
  font-size: 20px;
  color: #bfbfbf;
  display: block;
  border: none;
  background: none;
  width: 80%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

.sidenav a:hover{
  color:white;
  border: 1px double #f1f1f1;
}


.active {
  background-color: #004d99;
  color: white;
}


@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}



.saleimg{
position: absolute;
top:35%;
left:35%;
width:200px;
height:200px;
}

.saleimg:hover{
  border: 2px double black;
}



.returnimg{
position: absolute;
top:35%;
left:65%;
width:200px;
height:200px;
}

.returnimg:hover{
  border: 2px double black;
}

</style>

<body>

<?php
		include "odsms_config.php";
		session_start();

		$ename=$_SESSION['user'];
		$uid=$_SESSION['uid'];
?>

<div class="topnav">
	<h1>Online Drug Store Management System</h1>
	<a href="logout.php">Logout(signed in as <?php echo $ename; ?>)</a>
</div>

<div class="sidenav">	
	<a href="citymanager.php">Dashboard</a>
	<a href="ADDStoreManager.php">Add Store Manager</a>
	<a href="managestoremanagers.php">Store Managers</a>
	<a href="viewcitystores.php">View Stores</a>
	
	<a href="totalcitysales.php">Total Sales</a>
	<a href="totalcityreturns.php">Total Returns</a>

</div>
			

<center>
	<div class="head">
		<h2> WELCOME TO CITY MANAGER </h2>
	</div>
</center>

	
</body>
</html>