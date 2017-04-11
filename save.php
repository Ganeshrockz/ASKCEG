<?php
$con=mysqli_connect('127.0.0.1','root','');
if(!$con)
{
    echo "Not Connected to Server";
}
if(!mysqli_select_db($con,'askceg'))
{
    echo "Database Not Selected";
}
if(isset($_POST['submit']))
{
$rollnumber=$_POST['rollno'];

$name=$_POST['name'];

$gen=$_POST['gender'];

$course=$_POST['course'];

$year=$_POST['year'];


$mail=$_POST['email'];

$phonenum=$_POST['phonenumber'];


$about=$_POST['about'];
$sql="UPDATE register SET name='$name',gender='$gen',course='$course',year='$year',email='$mail',phonenumber='$phonenum',about='$about' WHERE rollnumber=$rollnumber";

//$sql="UPDATE maintable SET P='$played'";
if(!mysqli_query($con,$sql))
{
    echo "Not Inserted ";
}
else
echo "Successfully inserted";
header("refresh:1; url=dashboard.php");
}
?>
