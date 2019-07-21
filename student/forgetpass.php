<?php
include ('../include/dbcon.php');
session_start();
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
              <li><a href="index.php">Student</a></li>
              <li><a href="../faculty/index.php">Faculty</a></li>
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
  <strong><p>Forget Password</p></strong><br>
  <form class="form-inline" action="forgetpass.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <input type="submit" class="btn btn-default" name="submit" value="Send">
  </form>
  <?php
if(isset($_POST['submit']))
{
  $email = $_POST['email'];
  
  $qry = "SELECT * FROM `student` WHERE `email`='$email';";
  $res = $mysqli->query($qry) or die(error.__LINE__);
  $row = mysqli_fetch_assoc($res);
  
  $id = $row['id'];
  $_SESSION['id'] = $id;
  
		$cnt = mysqli_num_rows($res);
		if($cnt == 0)
		{
			?>  <br>
				<div class="container">
					<div class="alert alert-danger">
					<strong>Failed!</strong> Account doesn't exist!!
					</div>
				</div>
			<?php
		}
		else
    {

			$qry = "SELECT * FROM `student` WHERE `email`='$email';";
			$res = $mysqli->query($qry) or die(error.__LINE__);
			$cnt1 = mysqli_num_rows($res);
			if($cnt1 == 1)
			{
				$random = rand(527683, 967297);
        $pass = $random;

        $subject = "Reset Password";
        $message = "Your One Time Password is $pass";
        $from = "From: Rahul Shome<rahulshome8@gmail.com>";

        
        $pas = password_hash($pass, PASSWORD_BCRYPT, array('cost' => 10));
        $_SESSION['otp'] = $pas;
        
    	if(mail($email, $subject, $message, $from))
    					{
    						?>  <br>
    							<div class="container">
    							  <div class="alert alert-success">
    								          <strong>Success!</strong> One Time Password Sucessfully send to your email!!
                    </div>
    							</div>
    							<meta http-equiv="refresh" content="1; URL='password_r.php'" />
    						<?php
    					}
    					else
    					{
    						?>  <br>
    							<div class="container">
    							  <div class="alert alert-danger">
    								<strong>Failed!</strong> Failed to send One Time Password!!
    							  </div>
    							</div>
    						<?php
    					}
			}
		}
}
?>

</div>

</div>
<div id="section3" class="container-fluid">
    <div class="col-sm-4">
      This is Online Feedback Portal for the Students of MCA Department of RV College of Engineering.
    </div>
    <div class="col-sm-4">
      <p>Quick Links</p>
      <a href="student/index.php" style="text-decoration:none; color:white;">Student</a><br>
      <a href="faculty/index.php" style="text-decoration:none; color:white;">Faculty</a><br>
      <a href="admin/index.php" style="text-decoration:none; color:white;">Admin</a>
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
