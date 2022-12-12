<html>
<head>

<title>
	Country Wise Sales
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
	
			

<center>
	<div class="head">
	<h2> Total Sales Country Wise</h2>
	</div>
	
	<br><br><br><br><br><br><br><br><br>

<div style="margin-left:30%; margin-top:3%;">	
			<form  method="post">
		<select name="country">
			<option value="0" option="selected">Select Country</option>
					
	<?php	
	
		$qry3="SELECT country FROM store  ";
		$result3 = $conn->query($qry3);
		echo mysqli_error($conn);
		if ($result3->num_rows > 0) {
			while($row4 = $result3->fetch_assoc()) {
				
				echo "<option >".$row4['country']."</option>";
		}}
    ?>
		
    </select>

	&nbsp;&nbsp;

	
	
					<p>
						<label for="start">Start Date:</label>
						<input type="date" name="start">
					</p>
					<p>
						<label for="end">End Date:</label>
						<input type="date" name="end">
					</p>
				
			<input type="submit" name="submit" value="View Records">
			</form>	
			</div>
	
	<?php
	include "odsms_config.php";
		if(isset($_POST['submit'])) {
			
			$country=$_POST['country'];
			
		$stid = '';
		$qry11="SELECT storeid from store where country='$country'";
		$row11= $conn->query($qry11);
		// aquddos todo $row11=$row11->fetch_row();
		$i = 0; 		
		while ($row = mysqli_fetch_array($row11)) {
		$stid  .= $row[$i].',';// append comma after each value you append to the string
		}

		$stid = substr($stid,0,-1);
		//aaquddos $stid = $row11;
			
			$start=$_POST['start'];
			$end=$_POST['end'];
			
		
			
			$res1=mysqli_query($conn,"SELECT S_AMT('$start','$end','$stid') AS SAMT;") or die(mysqli_error($conn));
			while($row1=mysqli_fetch_array($res1))
			{
				$samt=$row1['SAMT'];
				
			} 
			
		
	?>	
	
	<table align="right" id="table1" style="margin-right:100px;">
		<tr>
			<th>Sale ID</th>
			<th>Store ID</th>
			<th>User ID</th>
			<th>Date And Time</th>
			<th>Sale Amount(in Rs)</th>
		</tr>
	
	<?php
	include "odsms_config.php";
	$sql = "SELECT saleid,storeid,s_date,s_time,total_amt FROM sales
			WHERE s_date >= '$start' AND s_date <= '$end' AND storeid in (SELECT storeid from store where country='$country')";
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	
		while($row = $result->fetch_assoc()) {
			
			
		echo "<tr>";
			echo "<td>" . $row['saleid']. "</td>";
			echo "<td>" . $row['storeid'] . "</td>";
			echo "<td>" . $row["s_date"]."&nbsp;&nbsp;&nbsp;&nbsp;".$row["s_time"]."</td>";
			echo "<td>" . $row["total_amt"]. "</td>";
			
		echo "</tr>";
	
	}
	
	
	echo "<tr>";
	echo "<td colspan=4>Total</td>";
	echo"<td >Rs.".$samt."</td>";
	echo "</tr>";
	echo "</table>";
		}}
	?>
	

		
</body>
</html>