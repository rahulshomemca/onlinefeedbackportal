<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
	$id = $_GET['id'];
	$chk = "SELECT * FROM questions WHERE `id`='$id';";
	$res = $mysqli->query($chk) or die(error.__LINE__);
	$row = $res->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Question</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit Question</h2>
  <p>Welcome Admin</p>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="feedback.php">View Question</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="add.php">Add Question</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Log Out</a></li>
    </ul>
  </div>
  <br>
  <div class="container">
  <h3>Edit Question along with option</h3><br>
  <form class="form-horizontal" action="edit_q.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="Question_n">Q No.:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="q_no" name="q_no" value="<?php echo $row['q_no'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Question">Question:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="text" name="ques" value="<?php echo $row['question'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="op1">Option 1:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="op1" name="op1" value="<?php echo $row['choice1'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="op2">Option 2:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="op2" name="op2" value="<?php echo $row['choice2'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="op3">Option 3:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="op3" name="op3" value="<?php echo $row['choice3'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="op4">Option 4:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="op4" name="op4" value="<?php echo $row['choice4'] ?>">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="op5">Option 5:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="op5" name="op5" value="<?php echo $row['choice5'] ?>">
      </div>
    </div>
    <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">UPDATE</button>
      </div>
    </div>
  </form>
</div>
</body>
</html>
