<html>
<head>

<title> ODSMS </title>

<style>

body{
	font-family:Arial;
	background-image:url("bg.png");
	background-size:cover;
	overflow:hidden;
}

.header {
  padding: 10px;
  margin:-10px;
  text-align: center;
  background: #003366;
  color: white;
  font-size: 30px;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: #003366;
   color: white;
   text-align: center;
}

.abc{
  color: dodgerblue;
  border: 2px solid black;
  background-color: #003366;
  color: white;
  padding: 14px 50px;
  font-size: 16px;
  cursor: pointer;
  border-radius:10px;
}


.abc a {
    color: white;
    text-decoration: none;
}

h1.lg {
	font-size: 150%;
    text-align: center;
	font-weight:bolder;
	text-shadow: 3px 0.1px white;
}
.modal {
	display: inline-block;
	position: fixed;
	z-index: 1; 
	left: 0;
	top: 40.5%;
	width: 100%;
	height: 100%;
	overflow: auto;
	background-color: rgb(0,0,0);
	background-color: rgba(0,0,0,0.4);
	padding-top: 60px;
}
.container{
    width:30%;
	margin:auto;
	background-color:white;
}
#div_login .textbox{
    width: 90%;
    padding: 7px;
}
h1.lg {
	font-size: 150%;
    text-align: center;
	font-weight:bolder;
	text-shadow: 3px 0.1px white;
}

#div_login{
    border:1px solid gray;
    border-radius: 3px;
    width: 30%px;
    height: 280px;
    box-shadow: 0px 2px 2px 0px  gray;
    margin: 0 auto;
}

#div_login h1{
    margin-top: 0px;
    font-weight: normal;
    padding: 10px;
    background-color: #003366;
    color: white;
    font-family: sans-serif;
}

#div_login div{
    clear: both;
    margin-top: 10px;
    padding: 5px;
	padding-right: 15px;
}

#div_login .textbox{
    width: 90%;
    padding: 7px;
}

input[type=submit]{
  background-color: #0077b3;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  display:inline-block;
  margin-top:5px;
}

</style>

</head>
<body>

<div  class="header">
	<h1 > Online Drug Store Management System</h1>
	<p style="margin-top:-20px; line-height:1; font-size: 25px ">A project of Computer Science Student (S21024D6BD)</p>
</div>



<div id="id01" class="modal">
	<form  method="post">
		<div class="container">
			<div id="div_login">
					<h1>Login To Store</h1>
		<center>
			<div>
				<input type="text" class="textbox" id="uname" name="uname" placeholder="Username" />
			</div>

			<div>
				<input type="password" class="textbox" id="pwd" name="pwd" placeholder="Password"/>
			</div>

			<div>
				<input type="submit" value="Submit" name="submit" id="submit" />
			</div>
		</center>
	
	</form>
</div>
</div>




	<?php

	include "odsms_config.php";

	if(isset($_POST['submit'])){

	$uname = mysqli_real_escape_string($conn,$_POST['uname']);
	$password = mysqli_real_escape_string($conn,$_POST['pwd']);

	if ($uname != "" && $password != ""){

	$sql="SELECT * FROM employee WHERE username='$uname' AND password='$password'";
	$result = $conn->query($sql);
	$row = $result->fetch_row();
	if(!$row) {
	echo "<p style='color:red;'>Invalid username or password!</p>";
	}
	else if ($row[4]=='Salesman'){
		
		session_start();
		$_SESSION['uid']=$row[0];
		$_SESSION['user']=$row[2];
		header("location:salesmendashboard.php");
	}
	else if ($row[4]=="Store Manager"){

		session_start();
		$_SESSION['uid']=$row[0];
		$_SESSION['user']=$row[2];
		header("location:storemanagerdashboard.php");
	}
	else if ($row[4]=="City Manager"){

		session_start();
		$_SESSION['user']=$row[2];
				$_SESSION['uid']=$row[0];
	
		header("location:citymanager.php");
	}
	else if ($row[4]=="Country Manager"){

		session_start();
		$_SESSION['user']=$row[2];
				$_SESSION['uid']=$row[0];
		header("location:countrymanager.php");
	}
	else if ($row[4]=="CEO"){

		session_start();
		$_SESSION['user']=$row[2];
		$_SESSION['uid']=$row[0];

		header("location:CEO.php");
	}
	else if ($row[4]=="ADMIN"){

		session_start();
		$_SESSION['user']=$row[2];

		header("location:admin.php");
	}
	else 
	{echo "Username or Password is Incorrect!";}
	}
}?>
		
</div>

<div class="footer">
	Developed by: Obaid & Awais
</div>

</body>
</html>