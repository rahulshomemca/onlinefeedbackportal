<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(!isset($_SESSION['id']))
	{
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Forget Password</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative;
  }
  #section1 {padding-top:50px;height:600px;}
  #section2 {padding-top:100px; padding-left: 80px; padding-right: 80px;height:450px;color: #fff; background-color: #5DBCD2;}
  #section3 {padding-top:30px;height:180px;color: #fff; background-color: black;}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Online Feedback Portal</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="../index.php">HOME</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Login<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="../student/index.php">Student</a></li>
              <li><a href="index.php">Faculty</a></li>
              <li><a href="../admin/index.php">Admin</a></li>
            </ul>
          </li>
          
        </ul>
      </div>
    </div>
  </div>
</nav>


<div id="section2" class="container-fluid">
	<div class="container">
  <form class="form-horizontal" action="update_password_r.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">One-Time-Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="pwd" placeholder="Enter One Time password" name="otp">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="npwd">New Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="npwd" placeholder="Enter new password" name="npwd">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="ncpwd">Confirm Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="pwd" placeholder="Enter confirm password" name="ncpwd">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">Change Password</button>
      </div>
    </div>
  </form>
</div>

</div>
<div id="section3" class="container-fluid">
    <div class="col-sm-4">
      This is Online Feedback Portal for the Students of MCA Department of RV College of Engineering.
    </div>
    <div class="col-sm-4">
      <p>Quick Links</p>
      <a href="../student/index.php" style="text-decoration:none; color:white;">Student</a><br>
      <a href="index.php" style="text-decoration:none; color:white;">Faculty</a><br>
      <a href="../admin/index.php" style="text-decoration:none; color:white;">Admin</a>
    </div>
    <div class="col-sm-4">
      R V College of Engineering<br>
      R V Vidyanikethan Post<br>
      Mysuru Road Bengaluru - 560 059<br>
      Ph : 91 - 080-6717 8021<br>
      Fax: 91 - 080-6717 8011<br>
      Email : principal@rvce.edu.in
    </div>
</div>



</body>
</html>
