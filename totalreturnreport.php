<!DOCTYPE html>
<html>

<head>

<title>
Total Returns
</title>
</head>

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




input[type=date], select {
  width: 80%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  margin-top:20px;
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


#table1 {
  font-family: Arial;
  border-collapse: collapse;
  margin-top:50px;
  margin-right:120px;
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
	<h2> Total Return Report</h2>
	</div>
</center>


			<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
		<div style="margin-left:20%; margin-top:3%;">	
			<p>
			<label for="start">Start Date:</label>
			<input type="date" name="start">
			</p>
			<p>
			<label for="end">End Date:</label>
			<input type="date" name="end">
			</p>
		
			<input type="submit" name="submit" value="View Records">
		</div>
			</form>	

	<?php
	include "odsms_config.php";
		if(isset($_POST['submit'])) {
			
			$qry10="SELECT storeid from employee where userid='$uid'";
		$row10= $conn->query($qry10);
		$row9=$row10->fetch_row();
		$stid = $row9[0];
			
			$start=$_POST['start'];
			$end=$_POST['end'];
			
			$res=mysqli_query($conn,"SELECT return_amount('$start','$end','$stid') AS returnamount;") or die(mysqli_error($conn));
			while($row=mysqli_fetch_array($res))
			{
				$ramt=$row['returnamount'];
				
			} 
			
			
			$ramt = number_format($ramt, 2);
	?>

	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Return ID</th>
			<th>Date and Time </th>
			<th>Return Amount(in Rs)</th>
		</tr>
	
	<?php
	include "odsms_config.php";
		
	
	
	$sql = "SELECT rid,r_date,r_time,tr_amount FROM returns
			WHERE r_date >= '$start' AND r_date <= '$end' AND storeid=$stid";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	
		while($row = $result->fetch_assoc()) {
			
			
		echo "<tr>";
			echo "<td>" . $row["rid"]. "</td>";
			echo "<td>" . $row["r_date"]."&nbsp;&nbsp;&nbsp;&nbsp;".$row["r_time"]."</td>";
			echo "<td>" . $row["tr_amount"]. "</td>";
			
		echo "</tr>";
		}
	echo "<tr>";
	echo "<td colspan=4>Total</td>";
	echo"<td >Rs.".$ramt."</td>";
	echo "</tr>";
	echo "</table>";
	}
	?>
	
	<table align="right" id="table1" style="margin-bottom:100px;margin-right:100px;">
	<tr style="background-color: #f2f2f2;" >
		<td>Total Returns Amount </td>
				<td>Rs.<?php echo $ramt; }?></td>
	</tr>
	</table>
		


</body>

</html>