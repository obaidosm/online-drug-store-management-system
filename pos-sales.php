<html>
<head>


<title>
Saleman POS SALES
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
  }

.topnav a:hover{
  color:red;
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
  padding-left: 10px;
  padding-bottom:80px;
  width:78%;
  float:center;
  margin-left:18.5%;
  margin-top:2%;
  margin-bottom:5%;
}


input[type=submit],.view-btn{
  background-color: #0077b3;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  display:inline-block;
  margin-top:2%;
  margin-left:20%;
  text-decoration:none;
}


input[type=submit]:hover {
  background-color: red;
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
	<a href="salesmendashboard.php">Dashboard</a>
	<a href="addnewsale.php">Point Of Sale</a>
	<a href="addnewreturn.php">Add Return Sale</a>
	<a href="inventory.php">View Inventory</a>
</div>			

<center>
	<div class="head">
	<h2> SALES INVOICE</h2>
	</div>
	</center>

	<table align='right' id='table1'>
		<tr>
			<th>Medicine ID</th>
			<th>Medicine Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total Price</th>
			<th>Action</th>
		</tr>
	
	<?php
	


		$qry10="SELECT storeid from employee where userid='$uid'";
		$row10= $conn->query($qry10);
		$row9=$row10->fetch_row();
		$stid = $row9[0];

	
		if(isset($_GET['sid'])) {
		$sid=$_GET['sid'];}
		
		if(empty($sid))
		{
			$sql ="SHOW TABLE STATUS LIKE 'sales'";

			if(!$result = $conn->query($sql)){
			die('There was an error running the query [' . $conn->error . ']');
				}

			$row = $result->fetch_assoc();
			$sid=$row['Auto_increment']-1;
		}
	
		if(!empty($sid)) {
		$qry1 = "SELECT medid,saleqty,totprice FROM saleitem where saleid=$sid ";
		$result1 = $conn->query($qry1);
		$sum=0;

			if ($result1->num_rows > 0) {
	
			while($row1 = $result1->fetch_assoc()) {
		
					$medid=$row1["medid"];
					$qry2 = "SELECT medname,medprice FROM medicine where medid=$medid ";
					$result2 = $conn->query($qry2);
					$row2=$result2->fetch_row();
					
				echo "<tr>";
					echo "<td>" . $row1["medid"]. "</td>";
					echo "<td>" . $row2[0]. "</td>";
					echo "<td>" . $row1["saleqty"]. "</td>";
					echo "<td>" . $row2[1]. "</td>";
					echo "<td>" . $row1["totprice"]. "</td>";
					echo "<td align=center>";
					echo "<a name='delete' class='button1 del-btn' href=posdelbtn.php?mid=".$row1['medid']."&slid=".$sid.">Delete</a>";	
					echo "</td>";
				echo "</tr>";
				}
			echo "</table>";
			}	
		}
		$tamt=$row1["saleqty"]*$row2[1];
	?>


		<div class="one" style="background-color:white;">
		<form method=post>
		<a name='addnewsale' class='view-btn' href="addnewsale.php?sid=".$sid.">Go Back to Sales Page</a> 
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type='submit' name='custadd'  value='Complete Order' ><br>
		</form>
		
	


    <?php
		

		if(isset($_POST['custadd'])) {
			
			$res=mysqli_query($conn,"SET @p1=$sid;");
			$res=mysqli_query($conn,"SET @p0=$stid");
			$res=mysqli_query($conn,"SET @p4=$uid");
			$res=mysqli_query($conn,"CALL `TOTAL_AMT`(@p0,@p1,@p2,@p4);") or die(mysqli_error($conn));
			$res=mysqli_query($conn,"SELECT @p2 as TOTAL;");
			
			while($row=mysqli_fetch_array($res))
			{
				$tot=$row['TOTAL'];
			}
					
			echo "<table align='right' id='table1'>
				<tr style='background-color: #f2f2f2;'>
				<td>Total</td>
				<td align='center'>";echo $tot;
				echo "</td>
				</tr>
			</table>";
			
			{
				$_insert="INSERT INTO `sales`( `S_DATE`, `S_TIME`, `TOTAL_AMT`) VALUES ('0','0','0')";
				$_insertd=$conn->query($_insert); 	
			}	
			
		}	
	?>

</div>









</body>

</html>