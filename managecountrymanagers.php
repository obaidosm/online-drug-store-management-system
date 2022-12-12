<html>
<head>

<title>
 Manage Country Manager
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
#table1 {
  font-family: Arial;
  border-collapse: collapse;
  margin-top:50px;
  margin-right:25px;
  width: 70%;
  overflow:auto;
}

#table1 td, #table1 th {
  border: 1px solid #ddd;
  padding: 8px;
}

#table1 tr:nth-child(even){background-color: #f2f2f2;}

#table1 tr:hover {background-color: #ddd;}

#table1 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #0077b3;
  color: white;
}

.button1 {
  border:none;
  color: white;
  padding: 10px 24px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 4px 2px;
  cursor: pointer;
}

.edit-btn
{
	background-color:#2E8B57;
}

.del-btn
{
	background-color:#800000;
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
	<a href="ceo.php">Dashboard</a>
	
	<a href="addcountrymanager.php">Add Country Manager</a>
	<a href="managecountrymanagers.php">Country Manager</a>
	
	<a href="view--stores.php">View Stores</a>
	
	<a href="totalsales.php">City Wise Sales</a>
	<a href="totalsales-country.php">Country Wise Sales </a>
	
	<a href="totalreturns.php">City Wise Returns</a>
	<a href="totalreturns-country.php">Country Wise Returns</a>
	
	<a href="profit.php">City Wise Profit </a>
	
	<a href="countryprofit.php">Country Wise Profit</a>
	

</div>
	
	
ter>
	<div class="head">
		<h2> Country Manager</h2>
	</div>
</center>

<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>EMP ID</th>
			<th>Store ID</th>
			<th>Username</th>
			<th>Password</th>
			<th>Role</th>
			<th>Name</th>
			<th>DOB</th>
			<th>Sex</th>
			<th>CNIC</th>
			<th>DOJ</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>Address</th>
			<th>Country</th>
			<th>Action</th>
			
		</tr>
	
	<?php
	include "odsms_config.php";
	
	
	
	$qry="SELECT empcountry FROM employee WHERE userid='$uid'";
	$row1= $conn->query($qry);
	$row2=$row1->fetch_row();
	$country=$row2[0];
	
		$sql = "SELECT userid,storeid, username, password,role,empname, empdob, empgender, empcnic, empdoj, empmobile, empmail, empcity, empcountry
				FROM employee 
				WHERE role='Country Manager'";
		

		$result = $conn->query($sql);
		if (($result->num_rows > 0)){
		
		while( ($row = $result->fetch_assoc())) {

		echo "<tr>";
			echo "<td>" . $row['userid']. "</td>";
			echo "<td>" . $row['storeid']. "</td>";
			echo "<td>" . $row['username']. "</td>";
			echo "<td>" . $row['password']. "</td>";
			echo "<td>" . $row['role']. "</td>";
			echo "<td>" . $row['empname']. "</td>";
			echo "<td>" . $row['empdob']. "</td>";
			echo "<td>" . $row['empgender']. "</td>";
			echo "<td>" . $row['empcnic']. "</td>";
			echo "<td>" . $row['empdoj']. "</td>";
			echo "<td>" . $row['empmobile']. "</td>";
			echo "<td>" . $row['empmail']. "</td>";
			echo "<td>" . $row['empcity']. "</td>";
				echo "<td>" . $row['empcountry']. "</td>";
		


			echo "<td align=center>";
						 
		echo "<a class='button1 edit-btn' href=edit-countrymanager.php?id=".$row['userid'].">Edit</a>";
		echo "<a onclick='return confirm('Are you sure to delete?');' class='button1 del-btn' href=del-countrymanagers.php?id=".$row['userid'].">Delete</a>";
		echo "</td>";
	echo "</tr>";
	}
	echo "</table>";
		} 

	$conn->close();
	?>

	
</body>
</html>