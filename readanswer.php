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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>AskCeg | Dashboard</title>
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
        <li><a href="#">Search</a></li>
        <li><a href="#">Notifications</a></li>
        <li><a href="profile.php">My Profile</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search" method="post" action="dashboard.php">
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
<?php
$qid=$_GET['id'];
$sql="SELECT * FROM dashboard WHERE questionid=$qid";
$rec1=mysqli_query($con,$sql);
$rec=mysqli_fetch_assoc($rec1);
$question=$rec['question'];
$date1=$rec['date1'];
$rollnumber=$rec['byuser'];
echo "<h1><u><strong>Question</strong></u></h1>";
echo "<h2><strong>".$question."</strong></h2><br>";
echo "<h5>Asked on <strong>".$date1."</strong></h5>";
echo "<h5>By <a href='#'><font color=\"red\">".$rollnumber."</font></a></h5><br>";
echo "<h2><strong><label>Answers</label></strong></h2>";
$sql1="SELECT * FROM answer WHERE questionid=$qid";
$rec2=mysqli_query($con,$sql1);
$counter=1;
$flag=0;
while($rec3=mysqli_fetch_assoc($rec2))
{
    $flag=1;
    echo "<h2><strong>".$rec3['answer']."</strong></h2>";
    echo "<h5>Answered On <strong>".$rec3['date1']."</strong></h5>";
    echo "<h5>By <a href='#'><font color=\"red\">".$rec3['byuser']."</font></a></h5><br><hr>";
}
if($flag==0)
{
    echo "<div class=\"well\"><h2><strong><center>No Answers Written Yet</center></strong></h2></div>";
}
?>
<footer class="container-fluid text-center">
  <p>&copy;  All rights reserved | Design by <a href="https://github.com/Ganeshrockz/">Ganesh</a></p>
</footer>

</body>
</html>