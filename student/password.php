<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Change Password</h2><br>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="dash.php">Back to Dashboard</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Log Out</a></li>
    </ul>
  </div>
</div>
<br>
<div class="container">
  <form class="form-horizontal" action="update_password.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Curent Password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="pwd" placeholder="Enter current password" name="pwd">
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
        <input type="password" class="form-control" id="ncpwd" placeholder="Enter confirm password" name="ncpwd">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">Change Password</button>
      </div>
    </div>
  </form>
</div>
</body>
