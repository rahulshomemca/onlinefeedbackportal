<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
	$email = $_GET['email'];
	$chk = "SELECT * FROM facultty WHERE `email`='$email';";
	$res = $mysqli->query($chk) or die(error.__LINE__);
	$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Profile</h2>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="dash.php">Back to Dashboard</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="updateprofile.php?email=<?php echo $_SESSION['email']?>">Update Profile</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Log Out</a></li>
    </ul>
  </div>
</div>
<br>
<div class="container">
  <form action="update_f.php" method="post">
		<div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" value="<?php echo $row['name']?>" name="name" readonly>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" value="<?php echo $row['email']?>" name="email" readonly>
    </div>
    <div class="form-group">
			<div class="form-group">
	      <label for="mobile">Mobile:</label>
	      <input type="number" class="form-control" id="mob" value="<?php echo $row['mobile']?>" name="mob" readonly>
	    </div>
			<div class="form-group">
	      <label for="desig">Designation:</label>
	      <input type="text" class="form-control" id="desig" value="<?php echo $row['desig']?>" name="desig" readonly>
	    </div>
			<div class="form-group">
	      <label for="dept">Department:</label>
	      <input type="text" class="form-control" id="dept" value="<?php echo $row['dept']?>" name="dept" readonly>
	    </div>
  </form>
</div>
</body>
