<html>
<head>

<title>
	Add Purchase
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

select {
  width:71.4%;
  padding: 12px;
  background-color:navy;
  color:white;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-left: 18.5%;
}
input[type=submit]:hover {
  background-color: red;
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
		<h2> ADD Purchase Record</h2>
	</div>
</center>
	

<form method="post">
		<select name="medicine">
			<option value="0" selected="selected">Select Medicine </option>
					
	<?php	

		$qry10="SELECT * from employee where userid='$uid'";
		$row10= $conn->query($qry10);
		$row9=$row10->fetch_row();
		$stid = $row9[1];
		
		

		
		
		$qry3="SELECT medname FROM medicine where storeid='$stid' ";
		$result3 = $conn->query($qry3);
		echo mysqli_error($conn);
		if ($result3->num_rows > 0) {
			while($row4 = $result3->fetch_assoc()) {
				
				echo "<option >".$row4["medname"]."</option>";
		}}
    ?>
		
    </select>

	&nbsp;&nbsp;

	<input type="submit" name="search" value="Search">
	</form>


	<?php
		if(isset($_POST['search'])&&! empty($_POST['medicine'])) {
	
			$medicine=$_POST['medicine'];
			
			$qry4="SELECT * FROM medicine where medname='$medicine'";
			$result4=$conn->query($qry4); 
			$row4 = $result4 -> fetch_row();			
		
		
		}
		
		
	?>






<div class="one row">

			<form  method="post">
				<div class="column">
					
					<p>
						<input type=hidden name="medid" value="<?php echo $row4[0]; ?>"readonly>
						
					</p>
					<p>
						<label>Medicine Name:</label><br>
						<input type="text" name="medname" value="<?php echo $row4[2]; ?>"readonly>
					<p>
						<label for="qty">Quantity:</label><br>
						<input type="number" name="medqty" min="1">
					</p>
					<p>
						<label for="sp">Purchasing Price: </label><br>
						<input type="number" step="0.01" min="1.00" name="pprice">
					</p>
					<p>
						<label for="sp">Purchasing Cost: </label><br>
						<input type="number" step="0.01" min="1.00" name="pcost">
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
					
					<input type="submit" name="add" value="Add Purchase Record">
				</div>
			</form>
		<br>
		<?php
	
		include "odsms_config.php";
		 
		if(isset($_POST['add']))
		{
		$med_id = mysqli_real_escape_string($conn, $_REQUEST['medid']);
		$med_quantity = mysqli_real_escape_string($conn, $_REQUEST['medqty']);
		$pprice = mysqli_real_escape_string($conn, $_REQUEST['pprice']);
		$pcost = mysqli_real_escape_string($conn, $_REQUEST['pcost']);
		$pmf = mysqli_real_escape_string($conn, $_REQUEST['pmfdate']);
		$pxp = mysqli_real_escape_string($conn, $_REQUEST['pxpdate']);
		$sid = mysqli_real_escape_string($conn, $_REQUEST['sid']);
		
		
		$qry10="SELECT * from employee where userid='$uid'";
		$row10= $conn->query($qry10);
		$row9=$row10->fetch_row();
		$stid = $row9[1];


		 

		$sql2="INSERT INTO purchase VALUES ('','$med_id','$stid','$uid','$med_quantity','$pprice','$pcost','','$pmf','$pxp','$sid')";
		if((mysqli_query($conn, $sql2))){
			echo "<p style='font-size:20;'>Purchase Record details Successfully Added!</p>";
		} else{
			echo "<p style='font-size:20; color:red;'>Error! Check details.</p>";
		}
		}
		 
		$conn->close();
	?>
		
	</div>


</body>

</html>