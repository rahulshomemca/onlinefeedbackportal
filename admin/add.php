<?php
include ('../include/dbcon.php');
session_start();
if(!isset($_SESSION['email']))
{
	header('location:index.php');
}
if(isset($_POST['submit']))
{
		$q_no = $_POST['q_no'];
		$ques = $_POST['ques'];
		$ch1 = $_POST['op1'];
		$ch2 = $_POST['op2'];
		$ch3 = $_POST['op3'];
		$ch4 = $_POST['op4'];
		$ch5 = $_POST['op5'];

		$qry = "INSERT INTO `questions` (`q_no`,`question`,`choice1`,`choice2`,`choice3`,`choice4`,`choice5`) VALUES ('$q_no','$ques','$ch1','$ch2','$ch3','$ch4','$ch5');";
		$result = $mysqli->query($qry) or die(error.__LINE__);
		if($result == true)
		{
			?>
			 <br>
				<div class="container">
					<div class="alert alert-success">
					<strong>Success!</strong> Faculty Added!!
					</div>
				</div>
			<?php
		}
		else
		{
			?>
			 <br>
				<div class="container">
					<div class="alert alert-danger">
					<strong>Failed!</strong> Faculty Not Added!!
					</div>
				</div>
			<?php
		}
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Question</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Question</h2>
  <p>Welcome Admin</p>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="feedback.php">View Question</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Log Out</a></li>
    </ul>
  </div>
  <br>
  <div class="container">
  <h3>Enter Question along with option</h3><br>
  <form class="form-horizontal" action="add.php" method="post">
  <div class="form-group">
      <label class="control-label col-sm-2" for="Question_n">Question Number:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="q_no" placeholder="Enter Question Number">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Question">Question:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="ques" placeholder="Enter Question">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="op1">Option 1:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="op1" placeholder="Enter Option 1">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="op2">Option 2:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="op2" placeholder="Enter Option 2">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="op3">Option 3:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="op3" placeholder="Enter Option 3">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="op4">Option 4:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="op4" placeholder="Enter Option 4">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="op5">Option 5:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="op5" placeholder="Enter Option 5">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">Add</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
