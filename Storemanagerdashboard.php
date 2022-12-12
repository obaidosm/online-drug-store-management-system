<html>
<head>
<title>
	Store Manager Dashboard
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



.totalsaleimg{
position: absolute;
top:40%;
left:30%;
width:200px;
height:200px;
}

.totalsaleimg:hover{
  border: 2px double black;
}



.totalreturnimg{
position: absolute;
top:40%;
left:50%;
width:200px;
height:200px;
}

.totalreturnimg:hover{
  border: 2px double black;
}



.addprsn{
position: absolute;
top:40%;
left:70%;
width:200px;
height:200px;
}

.addprsn:hover{
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
	<a href="logout.php">Logout(signed in as <?php echo $ename; echo "  ID: ", $uid;?>)</a>
</div>



<div class="sidenav">	
	<a href="storemanagerdashboard.php">Dashboard</a>
	<a>____________________</a>
	<a href="addmedicine.php">Add New Medicine</a>
	<a href="addsaleman.php">Add New Saleman</a>
	<a href="addpurchase.php">Add Purchase Record</a>
	<a>____________________</a>
	<a href="totalsalereport.php">Total Sale Report</a>
	<a href="totalreturnreport.php">Total Return Report</a>
	<a>____________________</a>
	<a href="manage-inventory.php">Manage Inventory</a>
	<a href="manage-salesman.php">Manage Salesman</a>
</div>
			

<center>
	<div class="head">
		<h2> STOREMANAGER DASHBOARD </h2>
	</div>
</center>
	



<<a href="totalsalereport.php"><img src="sale.png"  class="totalsaleimg" alt="Point Of Sale"></a>

<a href="totalreturnreport.php"><img src="return.png" class="totalreturnimg" alt="Sale Return"></a>

<a href="addsaleman.php"><img src="addprsn.png" class="addprsn" alt="Add Salesman+"></a>
	
</body>

</html>