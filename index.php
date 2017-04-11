<?php
$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
echo  "Not connected to server";
}
if(!mysqli_select_db($con,'askceg'))
{
    echo "Not connected to db";
}
session_start();
$_SESSION['currentuser']="";
 if(isset($_POST['submit']))
{

    $rollno=$_POST['rollno'];
    $pass=$_POST['password'];
$sql="SELECT * FROM register WHERE rollnumber=$rollno AND password='$pass'";
$rec=mysqli_query($con,$sql);
if(mysqli_num_rows($rec)<=0 || !$rec)
{
  
  $message = "Invalid username or password";
  echo "<script type='text/javascript'>alert('$message');</script>";
  mysqli_free_result($rec);
 header("refresh=1;Location: initial.php");
}
else
{
    $_SESSION['curr']=$_POST['rollno'];
    header("Location: http://localhost/example/askcegforum/dashboard.php");
}
}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>AskCEG</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Transparent Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' />
</head>

<body>
	<div class="header-w3l">
		<h1>Login </h1>
	</div>
<div class="main-content-agile">
	<div class="sub-main-w3">	
		<form action="#" method="post">
			<input placeholder="Roll Number" name="rollno" class="user" type="text" required=""><br>
			<input  placeholder="Password" name="password" class="pass" type="password" required=""><br>
			<input type="submit" name="submit" value="">
			<div class="footer">
			<p>Not an user yet...<a href="register.php">Click Here</a></p>
			</div>
		</form>
	</div>
</div>
<div class="footer">
	<p>&copy;  All rights reserved | Design by <a href="https://github.com/Ganeshrockz/">Ganesh</a></p>
</div>

</body>
</html>