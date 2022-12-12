<html>
<head>

<title>
	Edit Store
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
.one{
  border-radius: 5px;
  box-sizing: border-box;
  background-color: #f2f2f2;
  padding:30px;
  padding-left: 60px;
  width:1175px;
  float:right;
  margin-right:58px;
  margin-top:20px;
  margin-bottom:50px;
  font-family:Arial;
}

.column {
  float: left;
  width: 50%;
 }

.row:after {
  content: "";
  display: table;
  clear: both;
}


input[type=text],input[type=number],input[type=date],select {
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit]{
  background-color: #0077b3;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  display:inline-block;
  margin-top:20px;
}


input[type=submit]:hover {
  background-color: #0088cc;
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
		<h2> Change Store Manager </h2>
	</div>
</center>


<?php
	include "odsms_config.php";
	
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$qry1="SELECT * FROM store WHERE storeid='$id'";
		$result = $conn->query($qry1);
		$row = $result -> fetch_row();
		

	}
?>

<div class="one">
		<div class="row">
			<form  method="post">
				<div class="column">
				<p>
					<label >Store ID:</label><br>
					<input type="number" name="storeid" value="<?php echo $row[0]; ?>" readonly>
				</p>
				<p>
					<label>Manager ID:</label><br>
					<input type="number" name="smgrid" value="<?php echo $row[1]; ?>">
				</p>
				<p>
					<label >Location:</label><br>
					<input type="text" name="loc" value="<?php echo $row[2]; ?>" readonly>
				</p>
				<p>
					<label >City:</label><br>
					<input type="text" name="city" value="<?php echo $row[3]; ?>" readonly>
				</p>
				<p>
					<label >Country:</label><br>
					<input type="text" name="country" value="<?php echo $row[4]; ?>" readonly>
				</p>
				</div>
		
				<input type="submit" name="update" value="Update">
			</form>
			</div>
<?php

		if( isset($_POST['smgrid'])) {
			
			 $sid=$_POST['storeid'];
			 $smgrid=$_POST['smgrid'];
			 $loc=$_POST['loc'];
			$city=$_POST['city'];
			$country=$_POST['country'];
		
	
		
		$sql="UPDATE `store` SET `storeid`='$sid',`manager`='$smgrid',`location`='$loc', `country`='$country' WHERE storeid='$id'";
		
		if ( ($conn->query($sql)))
		{echo "<p style='font-size:20;'>Record Modified Successfully.</p>";
		header("location:manage-salesman.php");}
		else{
		echo "<p style='font-size:20;color:red;'>Error! Unable to update.</p>";
		}}

	?>
	
	
	</div>
</body>
</html>