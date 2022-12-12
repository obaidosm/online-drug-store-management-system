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
}

</style>

<body>

<?php
		include "odsms_config.php";
		session_start();

		$ename=$_SESSION['user'];
		$uid=$_SESSION['id'];
?>

<div class="topnav">
	<h1>Online Drug Store Management System</h1>
	<a href="logout.php">Logout(signed in as <?php echo $ename; echo "  ID: ", $uid;?>)</a>
</div>

<div class="sidenav">	
	<a href="countrymanager.php">Dashboard</a>
	<a href="addcitymanager.php">Add City Manager</a>
	<a href="managecitymanagers.php">View City Managers</a>
	<a href="view-country-stores.php">View Store</a>
	<a href="totalcountrysales.php">Total Sales</a>
	<a href="totalcountryreturns.php">Total Returns</a>

</div>
	
	
<center>
	<div class="head">
		<h2> Update Employee Details </h2>
	</div>
</center>

<?php
	include "odsms_config.php";
	
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		$qry1="SELECT * FROM employee WHERE userid='$id'";
		$result = $conn->query($qry1);
		$row = $result -> fetch_row();
		

	}
?>		


	<div class="one">
		<div class="row">
			<form  method="post">
				<div class="column">
				<p>
					<label for="empid">Employee ID:</label><br>
					<input type="number" name="empid" value="<?php echo $row[0]; ?>" readonly>
				</p>
				<p>
					<label for="stid">Store ID:</label><br>
					<input type="number" name="stid" value="<?php echo $row[1]; ?>">
				</p>
				<p>
					<label for="username">Username:</label><br>
					<input type="text" name="username" value="<?php echo $row[2]; ?>">
				</p>
				<p>
					<label for="password">Password:</label><br>
					<input type="text" name="password" value="<?php echo $row[3]; ?>">
				</p>
				<p>
					<label for="role">Role:</label><br>
						<select id="role" name="role">
								<option> </option>
								<option>Salesman</option>
								<option>Store Manager</option>
								<option>City Manager</option>
								<option>Country Manager</option>
								<option>CEO</option>
								
						</select>
						</p>
				</p>
				<p>
					<label for="ename">Name:</label><br>
					<input type="text" name="ename" value="<?php echo $row[5]; ?>">
				</p>
				
				<p>
					<label for="dob">Date of Birth: </label><br>
					<input type="date"  name="dob" value="<?php echo $row[6]; ?>">
				</p>
				<p>
						<label">Sex:</label><br>
						<select id="sex" name="sex">
								<option value="selected"><?php echo $row[7]; ?></option>
								<option>Female</option>
								<option>Male</option>
								<option>Others</option>
						</select>
				</p>
				
				<p>
					<label for="cnic">CNIC: </label><br>
					<input type="text"  name="cnic" value="<?php echo $row[8]; ?>">
				</p>
				</div>
				<div class="column">
				<p>
					<label for="doj">Date of Joinning: </label><br>
					<input type="date"  name="doj" value="<?php echo $row[9]; ?>">
				</p>
				<p>
					<label for="mobile">Mobile: </label><br>
					<input type="text"  name="mobile" value="<?php echo $row[10]; ?>">
				</p>
				<p>
					<label for="email">Email Address: </label><br>
					<input type="text"  name="email" value="<?php echo $row[11]; ?>">
				</p>
				<p>
					<label for="address">Address: </label><br>
					<input type="text" name="address" required >
				</p>
				<p>
					<label >Country: </label><br>
					<input type="text"  name="country" value="<?php echo $row[13]; ?>">
				</p>
				</div>
		
				<input type="submit" name="update" value="Update">
				</form>
				
	<?php

		if( isset($_POST['ename'])) {
			
			 $eid=$_POST['empid'];
			 $sid=$_POST['stid'];
			 $ename=$_POST['ename'];
			$dob=$_POST['dob'];
			$sex=$_POST['sex'];
			$cnic=$_POST['cnic'];
			$doj=$_POST['doj'];
			$mobile=$_POST['mobile'];
			$mail=$_POST['email'];
			$city=$_POST['address'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$role=$_POST['role'];
			$country=$_POST['country'];

	
		
		$sql="UPDATE `employee` SET `username`='$username',`password`='$password',`role`='$role', `empname`='$ename',`storeid`='$sid',`empdob`='$dob',`empgender`='$sex',`empcnic`='$cnic',`empdoj`='$doj',`empmobile`='$mobile',`empmail`='$mail',`empcity`='$city' ,`empcountry`='$country' WHERE userid=$eid";
		
		if ( ($conn->query($sql)))
		{echo "<p style='font-size:20;'>Record Modified Successfully.</p>";
		header("location:managecitymanagers.php");}
		else{
		echo "<p style='font-size:20;color:red;'>Error! Unable to update.</p>";
		}}

	?>
	
</body>
</html>