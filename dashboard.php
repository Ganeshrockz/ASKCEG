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
        <li class="active"><a href="#">Dashboard</a></li>
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
<?php
     if(isset($_POST['search1']))
{
$question=$_POST['ques'];
$user=$_SESSION['curr'];
$que1="INSERT INTO dashboard(question,byuser)values('$question','$user')";
$rec=mysqli_query($con,$que1);
if(!$rec)
{
    echo "ERROR";
}
header("refresh:2;Location: http://localhost/example/askcegforum/dashboard.php");
}
?>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span>Hi  <?php echo $_SESSION['curr'] ?></a></li>
        <li><a href="http://localhost/example/askcegforum/web/index.php"><span class="glyphicon glyphicon-user"></span>Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  <?php
  $flag=0;
  $query="SELECT * FROM dashboard";
  $que1=mysqli_query($con,$query);
  while($rec=mysqli_fetch_assoc($que1))
  {
      echo "<div class=\"well\"><center><h1><strong>".$rec['question']."</h1></strong> Asked By<a href='#'><h5><font color=\"red\">".$rec['byuser']."</font></h5></a><br>";
      echo "At<h5>".$rec['date1']."</h5><br>";
      $qid=$rec['questionid'];
      echo  "<h2><a href=\"http://localhost/example/askcegforum/answerquestion.php?id=$qid\">Answer</a></h2><a href=\"http://localhost/example/askcegforum/readanswer.php?id=$qid\">Read Answers</a></center></div><hr>";
      $flag=1;
  }
  if($flag==0)
  {
      echo "No Questions To answer";
  }
  ?>
<!--<div class="container text-center">    
  <div class="row">
    <div class="col-sm-3 well">
      <div class="well">
        <p><a href="#">My Profile</a></p>
        <img src="bird.jpg" class="img-circle" height="65" width="65" alt="Avatar">
      </div>
      <div class="well">
        <p><a href="#">Interests</a></p>
        <p>
          <span class="label label-default">News</span>
          <span class="label label-primary">W3Schools</span>
          <span class="label label-success">Labels</span>
          <span class="label label-info">Football</span>
          <span class="label label-warning">Gaming</span>
          <span class="label label-danger">Friends</span>
        </p>
      </div>
      <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">Ã—</a>
        <p><strong>Ey!</strong></p>
        People are looking at your profile. Find out who.
      </div>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
      <p><a href="#">Link</a></p>
    </div>
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
              <p contenteditable="true">Status: Feeling Blue</p>
              <button type="button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-thumbs-up"></span> Like
              </button>     
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>John</p>
           <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Bo</p>
           <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Jane</p>
           <img src="bandmember.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>Anja</p>
           <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Just Forgot that I had to mention something about someone to someone about how I forgot something, but now I forgot it. Ahh, forget it! Or wait. I remember.... no I don't.</p>
          </div>
        </div>
      </div>     
    </div>
    <div class="col-sm-2 well">
      <div class="thumbnail">
        <p>Upcoming Events:</p>
        <img src="paris.jpg" alt="Paris" width="400" height="300">
        <p><strong>Paris</strong></p>
        <p>Fri. 27 November 2015</p>
        <button class="btn btn-primary">Info</button>
      </div>      
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
  </div>
</div>-->

<footer class="container-fluid text-center">
  <p>&copy;  All rights reserved | Design by <a href="https://github.com/Ganeshrockz/">Ganesh</a></p>
</footer>

</body>
</html>