<html>
<head>

<title>
	Add New Saleman
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
		<h2> ADD SALESMAN </h2>
	</div>
</center>
	



	<div class="one row">
	
	<?php
	
		include "odsms_config.php";
		 
		$qry10="SELECT storeid from employee where userid='$uid'";
		$row10= $conn->query($qry10);
		$row9=$row10->fetch_row();
		$stid = $row9[0];
		 
		if(isset($_POST['add']))
		{
		
		$s_name = mysqli_real_escape_string($conn, $_REQUEST['sname']);
		$s_username = mysqli_real_escape_string($conn, $_REQUEST['susername']);
		$s_password = mysqli_real_escape_string($conn, $_REQUEST['spassword']);
		$s_role = mysqli_real_escape_string($conn, $_REQUEST['role']);
		$s_dob = mysqli_real_escape_string($conn, $_REQUEST['sdob']);
		$s_sex= mysqli_real_escape_string($conn, $_REQUEST['ssex']);
		$s_cnic = mysqli_real_escape_string($conn, $_REQUEST['scnic']);
		$s_doj= mysqli_real_escape_string($conn, $_REQUEST['sdoj']);
		$s_num = mysqli_real_escape_string($conn, $_REQUEST['snum']);
		$s_email = mysqli_real_escape_string($conn, $_REQUEST['semail']);
		$s_address = mysqli_real_escape_string($conn, $_REQUEST['saddress']);
		$country = mysqli_real_escape_string($conn, $_REQUEST['country']);
		
		

	
		
	$sql2 = "INSERT INTO employee VALUES ('','$stid','$s_username','$s_password','$s_role','$s_name','$s_dob','$s_sex','$s_cnic','$s_doj','$s_num','$s_email','$s_address','$country')";
		
			 
			 if((mysqli_query($conn, $sql2))){
			 
			echo "<p style='font-size:20;'>Record Entered successfully !</p>";
			 }
		else{
			echo "<p style='font-size:20; color:red;'>Error! Check details.</p>";
		}
		
		
		}
		$conn->close();
	?>
		
			<form  method="post">
				<div class="column">
					
				
					<p>
						<label>Name:</label><br>
						<input type="text" name="sname" placeholder="Name">
					</p>
					<p>
						<label>Username:</label><br>
						<input type="text" name="susername"  placeholder="username">
					</p>
					<p>
						<label>Password:</label><br>
						<input type="password" name="spassword"  placeholder="*********" min="8">
					</p>
					<p>
						
						<input type=hidden id="role" name="role" value="Salesman" readonly>
							
								
							
						</select>
					</p>
					<p>
						<label">Date of Birth:</label><br>
						<input type="date" name="sdob">
					</p>
					<p>
						<label">Sex:</label><br>
						<select id="esex" name="ssex">
								<option value="selected">Select</option>
								<option>Female</option>
								<option>Male</option>
								<option>Others</option>
						</select>
					</p>
					<p>
						<label>CNIC Number:</label><br>
						<input type="text" name="scnic" placeholder="35201-7930021-9">
					</p>
					<p>
						<label">Date of Joining:</label><br>
						<input type="date" name="sdoj">
					</p>

					<p>
						<label">Phone Number:</label><br>
						<input type="text" name="snum"  placeholder="03088035204">
					</p>
					
					<p>
						<label">Email ID:</label><br>
						<input type="text" name="semail"  placeholder="@example.com">
					</p>
					<p>
						<label">City:</label><br>
				<input type="text" name="saddress">
					</p>
					<p>
						<label>Country:</label><br>
						<input type="text" name="country">
					</p>
					
					
				</div>
				
			
			<input type="submit" name="add" value="Add Employee">
			</form>
		<br>
		
	</div>


</body>

</html>