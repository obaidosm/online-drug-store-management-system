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
		$uid=$_SESSION['id'];
		
		$qry10="SELECT storeid from employee where userid='$uid'";
		$row10= $conn->query($qry10);
		$row9=$row10->fetch_row();
		$stid = $row9[0];
		 
?>

<div class="topnav">
	<h1>Online Drug Store Management System</h1>
	<a href="logout.php">Logout(signed in as <?php echo $ename; ?>)</a>
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
	
		
	<?php
	include "odsms_config.php";
	
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$qry1="SELECT * FROM medicine WHERE medid='$id'";
		$result = $conn->query($qry1);
		$row = $result -> fetch_row();
	}
?>		

	<center>
	<div class="head">
	<h2> UPDATE MEDICINE DETAILS</h2>
	</div>
	</center>

	<div class="one">
		<div class="row">
			<form  method="post">
				<div class="column">
				<p>
					<label for="medid">Medicine ID:</label><br>
					<input type="number" name="medid" value="<?php echo $row[0]; ?>" readonly>
				</p>
				<p>
					<label for="medname">Medicine Name:</label><br>
					<input type="text" name="medname" value="<?php echo $row[2]; ?>">
				</p>
				<p>
					<label for="qty">Quantity:</label><br>
					<input type="number" name="qty" value="<?php echo $row[3]; ?>">
				</p>
				</div>
				<div class='column'>
				<p>
					<label for="sp">Price: </label><br>
					<input type="number" step="0.01" name="sp" value="<?php echo $row[4]; ?>">
				</p>
				<p>
					<label for="medname">Manufacturer:</label><br>
					<input type="text" name="medmf" value="<?php echo $row[5]; ?>">
				</p>
				</div>
		
				<input type="submit" name="update" value="Update">
				</form>
				
	<?php

		if( isset($_POST['medid'])) {
			 $id=$_POST['medid'];
			 $medname=$_POST['medname'];
			 $qty=$_POST['qty'];
			
			 $sp=$_POST['sp'];
			 $medmf=$_POST['medmf'];
			
			 
		$sql="UPDATE medicine SET medname='$medname',medqty='$qty',medprice='$sp', medmf='$medmf' where medid='$id'";
		if ($conn->query($sql))
		{echo "<p style='font-size:20;'>Record Modified Successfully.</p>";
		header("location:update_med.php");}
		else{
		echo "<p style='font-size:10;color:red;'>Error! Unable to update.</p>";
		}}

	?>

		</div>
	</div>
	
	
</body>

</html>