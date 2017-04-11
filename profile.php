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
$useno=$_SESSION['curr'];
$sql="SELECT * FROM register WHERE rollnumber=$useno";
$record=mysqli_query($con,$sql);
while($play=mysqli_fetch_assoc($record))
{
    $name= $play['name'];
   $password= $play['password'];
   $course=$play['course'];
   $year= $play['year'];
   $email=$play['email'];
   $gender=$play['gender'];
   $phonenumber=$play['phonenumber'];
   $about=$play['about'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>AskCeg | Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>    
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="dashboard.php">Dashboard</a></li>
        <li><a href="#">Check In</a></li>
        <li><a href="#">Notifications</a></li>
        <li><a href='#'>My Profile</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search" method="post">
        <div class="form-group input-group">
          <input type="text" name='ques' class="form-control" placeholder="Ask a Question.....">
          <span class="input-group-btn">
           <button class="btn btn-default" type="submit" name='search1'>
              <span class="glyphicon glyphicon-search"></span>
              </button>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Hi  <?php echo $_SESSION['curr'] ?></a></li>
        <li><a href="http://localhost/example/askcegforum/web/index.php"><span class="glyphicon glyphicon-user"></span>Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<form role="form" method="post" action="save.php">
    <div class="container text-center">
    <div class="well">
    <center>
        <div class="form-group">
    <strong>Rollno:</strong>
    <input type="text" name="rollno" value="<?php echo $useno?>"></input></div><br>
    <div class="form-group">
        <strong>Name:</strong>
    <input type="text" name="name" value="<?php echo $name?>"></input></div><br>
    <div class="form-group">
        <strong>Gender:</strong>
    <input type="text" name="gender" value="<?php echo $gender?>"></input></div><br>
    <div class="form-group">
        <strong>Course:</strong>
    <input type="text" name="course" value="<?php echo $course?>"></input></div><br>
    <div class="form-group">
        <strong>Year:</strong>
    <input type="text" name="year" value="<?php echo $year?>"></input></div><br>
    <div class="form-group">
        <strong>EmailID:</strong>
    <input type="text" name="email" value="<?php echo $email?>"></input></div><br>
    <div class="form-group">
        <strong>Phonenumber:</strong>
    <input type="text" name="phonenumber" value="<?php echo $phonenumber?>"></input></div><br>
    <div class="form-group">
        <strong>About:</strong>
    <input type="text" name="about" value="<?php echo $about?>"></input></div><br>
    </div>
    <button name="submit">SAVE CHANGES</button>
    </form>
    </center>
    </div>
    </div>
<footer class="container-fluid text-center">
  <p>&copy;  All rights reserved | Design by <a href="https://github.com/Ganeshrockz/">Ganesh</a></p>
</footer>

</body>
</html>