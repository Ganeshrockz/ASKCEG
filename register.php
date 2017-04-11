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
if(isset($_POST['submit']))
{
    $rollno=$_POST['rollno'];
    $pass=$_POST['password'];
    $name=$_POST['name'];
    $gen=$_POST['gender'];
    $course=$_POST['course'];
    $year=$_POST['year'];
    $phone=$_POST['phonenumber'];
    $email=$_POST['mail'];
    $about=$_POST['about'];
    $que1="SELECT * FROM register where rollnumber=$rollno";
    $rec=mysqli_query($con,$que1);
    if(mysqli_num_rows($rec)>0)
    {
        $msg="Username Already Exists....Choose a different one";
        echo "<script type='text/javascript'>alert('$msg');</script>";
        mysqli_free_result($rec);
    }
    else
    {
    $query="INSERT INTO register(rollnumber,password,name,gender,course,year,phonenumber,email,about) VALUES('$rollno','$pass','$name','$gen','$course','$year','$phone','$email','$about')";
    $record=mysqli_query($con,$query);
     require_once("C:\php\PHPMailer-PHPMailer-adb0197\class.phpmailer.php");
    $mail=new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPDebug=1;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='ssl';
    $mail->Host="smtp.gmail.com";
    $mail->Port=465;
    $mail->isHTML(true);
    $mail->Username="ganesh890370@gmail.com";
    $mail->Password="9486428529";
    $mail->SetFrom("ganesh890370@gmail.com");
    $mail->Subject="TestMail";
    $mail->Body="Hi you have registered to AskCeg";
    $mail->AddAddress($email);
    if(!$mail->Send())
        echo "Error".$mail->ErrorInfo;
    $msg1="Successfully Registered";
    echo "<script type='text/javascript'>alert('$msg1');</script>";
    header("Location: index.php");
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
		<h1>SignUp </h1>
	</div>
<div class="main-content-agile">
	<div class="sub-main-w3">	
		<form action="#" method="post">
			<input placeholder="Roll Number" name="rollno" class="user" type="text" required=""><br>
			<input  placeholder="Password" name="password" class="pass" type="password" required=""><br>
            <input  placeholder="Name" name="name" type="text" required=""><br>
            <input  placeholder="Gender" name="gender" type="text" required=""><br>
            <input  placeholder="Course" name="course" type="text" required=""><br>
            <input  placeholder="Year" name="year" type="text" required=""><br>
            <input  placeholder="MailId" name="mail" type="text" required=""><br>
            <input  placeholder="Phone Number" name="phonenumber" type="text" required=""><br>
            <input  placeholder="About" name="about" type="text" required=""><br>    
			<input type="submit" name="submit" value="">
            <div class="footer">
            <p><a href="index.php">Back</a></p>
            </div>
		</form>
	</div>
</div>
<div class="footer">
	<p>&copy;  All rights reserved | Design by <a href="https://github.com/Ganeshrockz/">Ganesh</a></p>
</div>
</body>
</html>