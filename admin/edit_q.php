<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(isset($_SESSION['email']))
	{
    $id = $_POST['id'];
    $q_no = $_POST['q_no'];
		$ques = $_POST['ques'];
		$ch1 = $_POST['op1'];
		$ch2 = $_POST['op2'];
		$ch3 = $_POST['op3'];
		$ch4 = $_POST['op4'];
		$ch5 = $_POST['op5'];

		$qry = "UPDATE `questions` SET `q_no`='$q_no',`question`='$ques',`choice1`='$ch1',`choice2`='$ch2',`choice3`='$ch3',`choice4`='$ch4',`choice5`='$ch5' WHERE `id`='$id';";
		$result = $mysqli->query($qry) or die(error.__LINE__);
					if($result == true)
					{
						?>  <br>
							<div class="container">
							  <div class="alert alert-success">
								<strong>Success!</strong> Question updated!!
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
								<strong>Failed!</strong> Order Id not updated!!
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
<html lang="en">
<head>
  <title>Edit Question</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>
