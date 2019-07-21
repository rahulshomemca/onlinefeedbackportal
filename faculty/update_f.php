<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(isset($_SESSION['email']))
	{
		$email = $_POST['email'];
		$name = $_POST['name'];
		$mob = $_POST['mob'];
		$desig = $_POST['desig'];
		$dept= $_POST['dept'];
		$qry = "UPDATE `facultty` SET `name` = '$name' , `mobile` = '$mob' , `desig` = '$desig' , `dept` = '$dept' WHERE `email` = '$email';";
		$result = $mysqli->query($qry) or die(error.__LINE__);
					if($result == true)
					{
						?>  <br>
							<div class="container">
							  <div class="alert alert-success">
								<strong>Success!</strong> Profile updated!!
							  </div>
							  <meta http-equiv="refresh" content="2; URL='viewprofile.php?email=<?php echo $_SESSION['email']?>'" />
                              <?php echo "If you are not redirected yet , "?><a href="viewprofile.php?email=<?php echo $_SESSION['email']?>">Click Here</a>
							</div>
						<?php
					}
					else
					{
						?>  <br>
							<div class="container">
							  <div class="alert alert-danger">
								<strong>Failed!</strong> Profile updated!!
							  </div>
							  <meta http-equiv="refresh" content="2; URL='viewprofile.php?email=<?php echo $_SESSION['email']?>'" />
                               <?php echo "If you are not redirected yet , "?><a href="viewprofile.php?email=<?php echo $_SESSION['email']?>">Click Here</a>
							</div>
						<?php
					}
					
	}
	else
	{
		header('location:index.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>
