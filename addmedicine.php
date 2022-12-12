<html>
<head>

<title>
	Add New Medicine
</title>

<style>

body {
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
  padding-right:10px;
  padding-left: 60px;
  width:78%;
  float:right;
  margin-right:50px;
  margin-top:2%;
  margin-bottom:50px;
  font-family:Arial;
}

input[type=text],input[type=number],input[type=password],input[type=date],select {
  width: 100%;
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

.dashboard:{
	width:50%;
	Height:50%;
	Background-color:gray;	
}


</style>
</head>

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
	<h2> ADD NEW MEDICINE + PURCHASE DETAILS</h2>
	</div>
	</center>

	<div class="one">
		<div class="row">
			<form action="addmedicine.php" method="post">
				<div class="column">
					<p>
						<label for="medid">Medicine ID:</label><br>
						<input type="number" name="medid" min="1001" placeholder="For E.g    20001, where 2 is store id & 0001 is med id">
					</p>
					
					<p>
						<label for="medname">Medicine Name:</label><br>
						<input type="text" name="medname">
					</p>
					<p>
						<label for="qty">Quantity:</label><br>
						<input type="number" name="medqty" min="1">
					</p>
		
					
					<p>
						<label for="sp">Medicine Price: </label><br>
						<input type="number" step="0.01" min="1.00" name="medprice">
					</p>
					<p>
						<label for="sp">Purchasing Price: </label><br>
						<input type="number" step="0.01" min="0.01" name="pprice">
					</p>
					
					<p>
						<label for="mf">Manufacturer: </label><br>
						<input type="text" name="mf">
					</p>
					<p>
						<label for="mf">Manufacturing Date: </label><br>
						<input type="date" name="pmfdate">
					</p>
					<p>
						<label for="mf">Expiry Date: </label><br>
						<input type="date" name="pxpdate">
					</p>
					<p>
						<label for="mf">Supplier ID: </label><br>
						<input type="number" name="sid">
					</p>
					
					<input type="submit" name="add" value="Add Medicine">
				</div>
			</form>
			<?php
	
		include "odsms_config.php";
		 
		if(isset($_POST['add']))
		{
		$med_id = mysqli_real_escape_string($conn, $_REQUEST['medid']);
		$med_name = mysqli_real_escape_string($conn, $_REQUEST['medname']);
		$med_quantity = mysqli_real_escape_string($conn, $_REQUEST['medqty']);
		$med_price = mysqli_real_escape_string($conn, $_REQUEST['medprice']);
		$med_mf = mysqli_real_escape_string($conn, $_REQUEST['mf']);
		$pprice = mysqli_real_escape_string($conn, $_REQUEST['pprice']);
		$pmf = mysqli_real_escape_string($conn, $_REQUEST['pmfdate']);
		$pxp = mysqli_real_escape_string($conn, $_REQUEST['pxpdate']);
		$sid = mysqli_real_escape_string($conn, $_REQUEST['sid']);
		
		
		$qry10="SELECT * from employee where userid='$uid'";
		$row10= $conn->query($qry10);
		$row9=$row10->fetch_row();
		$stid = $row9[1];
		 $user=$row9[0];

		 
		$sql = "INSERT INTO medicine VALUES ($med_id,$stid, '$med_name',$med_quantity,$med_price,'$med_mf')";
		$sql2="INSERT INTO purchase VALUES ('','$med_id','$stid','$user','$med_quantity','$pprice','','','$pmf','$pxp','$sid')";
		if(mysqli_query($conn, $sql)&&(mysqli_query($conn, $sql2))){
			echo "<p style='font-size:20;'>Medicine details successfully added!</p>";
		} else{
			echo "<p style='font-size:20; color:red;'>Error! Check details.</p>";
		}
		}
		 
		
	?>
		</div>
	</DIV>
</body>

</html>