<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(isset($_SESSION['email']))
	{
		$id = $_GET['id'];
		$qry = "DELETE FROM `questions` WHERE `id` = '$id';";
		$result = $mysqli->query($qry) or die(error.__LINE__);
					if($result == true)
					{
						?>  <br>
							<div class="container">
							  <div class="alert alert-success">
								<strong>Success!</strong> Question Deleted!!
							  </div>
							  <meta http-equiv="refresh" content="1; URL='feedback.php'" />
                              <?php echo "If you are not redirected yet <a href='feedback.php'>click here</a>.";?>
							</div>
						<?php
					}
					else
					{
						?>  <br>
							<div class="container">
							  <div class="alert alert-danger">
								<strong>Failed!</strong> Question Not Deleted!!
							  </div>
							  <meta http-equiv="refresh" content="1; URL='feedback.php'" />
                               <?php echo "If you are not redirected yet <a href='feedback.php'>click here</a>.";?>
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
<html>
<head>
    <title>Delete Status</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  
</body>
</html>
