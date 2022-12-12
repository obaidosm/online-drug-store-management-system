<html>
<head>


<title>
Add Sale
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



input[type=text],input[type=number],input[type=password],input[type=date]{
  width: 50%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  position: absolute;
  left:35%;
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

.column {
  float: left;
  width: 33%;
 }

.row:after {
  content: "";
  display: table;
  clear: both;
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
  background-color: red;
}

.final{
	position:absolute;
	top:75%;
	left:35%;
	width:50%;
}


a.button1.view-btn {
position: absolute;
left:57%;
top: 84%;
text-decoration:none;
border: 5px double white;
color:white;
padding:5px;
background-color:blue;
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
		<h2> POINT OF SALE </h2>
	</div>
</center>


	<form method="post">
		<select name="medicine">
			<option value="0" selected="selected">Select Medicine </option>
					
	<?php	

		$qry10="SELECT storeid from employee where userid='$uid'";
		$row10= $conn->query($qry10);
		$row9=$row10->fetch_row();
		$stid = $row9[0];

		
		
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
	
	
	<div class="one row" style="">
			<form method="post">
				<div class="column">
					
					<label>Medicine ID:</label>
					<input type="number" name="medid" value="<?php echo $row4[0]; ?>"readonly ><br><br>
					
					<label>Medicine Name:</label>
					<input type="text" name="mdname" value="<?php echo $row4[2]; ?>"  readonly><br><br>
					
					<label>Quantity Available:</label>
					<input type="number" name="mqty" value="<?php echo $row4[3]; ?>" readonly><br><br>
					
					<label>Price of One Unit:</label>
					<input type="number" name="mprice" value="<?php echo $row4[4]; ?>" readonly>  <br><br>
					
					<label>Manufacturer:</label>
					<input type="text" name="medmf" value="<?php echo $row4[5]; ?>"  readonly><br><br>
					
				
					<label>Quantity Required:</label>
					<input type="number" name="mcqty" value="" min="1" max=mqty><br><br>
					
				
					&nbsp;&nbsp;&nbsp;
		
					<input type="submit" class="final" name="add" value="Add Medicine">&nbsp;&nbsp;&nbsp;
					
	
          <?php
		
		if(isset($_POST['add'])) {
			
				$qry5="select saleid from sales ORDER BY saleid DESC LIMIT 1";
				$result5=$conn->query($qry5); 
				$row5=$result5->fetch_row();
				$sid=$row5[0];
				echo mysqli_error($conn);
		
				$mid=$_POST['medid'];
				$aqty=$_POST['mqty'];
				$qty=$_POST['mcqty'];
				
				if($qty>$aqty||$qty==0)
				{echo "QUANTITY INVALID!";}
				else {
				$price=$_POST['mprice']*$qty;
				$qry6="INSERT INTO saleitem(`saleid`,`medid`,`storeid`,`saleqty`,`totprice`) VALUES($sid,$mid,$stid,$qty,$price)";
				$result6 = mysqli_query($conn,$qry6);
				echo mysqli_error($conn);
				echo "Madicine Added Successfully";
				echo "<br><br> <center>";
				echo "<a class='button1 view-btn' href=pos-sales.php?sid=".$sid.">View Order</a>";
				echo "</center>";
				}
				
		}	
	?>

</div>
	
</body>

</html>