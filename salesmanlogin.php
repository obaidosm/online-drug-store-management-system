<html>
<head>
<title>
Salesman Login
</title>
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

.header p{
	margin-top:-20px;
	line-height:1;
	font-size: 25px; 
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

.close {
    position: absolute;
    right: 25px;
    top: 9%;
    left: 950px;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,.close:focus {
	color: red;
	cursor: pointer;
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

.animate {
	-webkit-animation: animatezoom 0.6s;
	animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
	from {-webkit-transform: scale(0)} 
	to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
	from {transform: scale(0)} 
	to {transform: scale(1)}
}

.container{
    width:30%;
	margin:auto;
	background-color:white;
}
</style>
</head>
<body>


<div  class="header">
	<h1 > Online Drug Store Management System</h1>
	<p>A project of Computer Science Student</p>
</div>
		
	
	

	<center>
		<h1 class="lg">Login: </h1>
			
	</center>

<div id="id01" class="modal">
	<form  method="post">
		<div class="container">
			<div id="div_login">
				<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
					<h1>Salesman Login</h1>
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

<?php

	include "odsms_config.php";

	if(isset($_POST['submit'])){

	$uname = mysqli_real_escape_string($conn,$_POST['uname']);
	$password = mysqli_real_escape_string($conn,$_POST['pwd']);

	if ($uname != "" && $password != ""){

	$sql="SELECT * FROM users WHERE username='$uname' AND password='$password'";
	$result = $conn->query($sql);
	$row = $result->fetch_row();
	if(!$row) {
	echo "<p style='color:red;'>Invalid username or password!</p>";
	}
	else if ($row[3]=='Salesman'){
		$emp=$row[1];
		session_start();
		$_SESSION['user']=$emp;
		header("location:salesmendashboard.php");
	}
	else if ($row[]=="Store Manager"){
		session_start();
		$_SESSION['user']=$emp;
		header("location:storemanagerdashboard.php");
	}
	}
}?>
		
</div>
</div>

<div class="footer">
	Developed by: Obaid & Awais
</div>

</body>
</html>