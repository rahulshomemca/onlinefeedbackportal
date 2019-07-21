<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
//Insert Data

  //faculty details
	$order_id = $_SESSION['order_id'];
	$que = "SELECT * FROM `facultty` WHERE `order_id`='$order_id';";
	$qr = $mysqli->query($que) or die(error.__LINE__);
    $faculty = $qr->fetch_assoc();
	$id = $faculty['order_id'];


	$que1 = "SELECT * FROM `facultty`;";
	$qr1 = $mysqli->query($que1) or die(error.__LINE__);
	$f_cnt = mysqli_num_rows($qr1);
	$_SESSION['f_cnt'] = $f_cnt;

	//name
	$email = $_SESSION['email'];
	$query = "SELECT * FROM `student` WHERE `email`='$email';";
	$res = $mysqli->query($query) or die(error.__LINE__);
    $detail = $res->fetch_assoc();

    //fetch question
	$q_no = $_GET['q_no'];
	$_SESSION['q_no'] = $q_no;
	$qry = "SELECT * FROM questions WHERE q_no = '$q_no';";
	$result = $mysqli->query($qry) or die(error.__LINE__);
	$cnt = mysqli_num_rows($result);


	$qr = "SELECT * FROM questions;";
	$resu = $mysqli->query($qr) or die(error.__LINE__);
	$cnt = mysqli_num_rows($resu);
	$_SESSION['cnt'] = $cnt;

	//feedback
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Portal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	input[type="text"] { border: none }
	</style>
</head>
<body>

<div class="container">
  <h3>Feedback Form<a href="logout.php"><button type="button" class="btn btn-primary" style="float:right;">Log Out</button></a></h3>
  <br><a href="password.php" style="float:right;">Change Password</a>
</div>
<br>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Welcome <strong><?php echo $detail['name']?></strong><br>
					General Instruction : You Need To Check Question and Option from given options
				</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Give Feedback for :<strong> <?php echo $faculty['name']?></strong> (<?php echo $faculty['desig']?>)<strong> <p style="float:right;padding-right:5px;">Question <?php echo $_SESSION['q_no']; ?> of <?php echo $cnt; ?></strong></td>
      </tr>
    </tbody>
  </table>
</div>
<?php

				$row = $result->fetch_assoc();

				?>

<form action="submit.php?id=<?php echo $row['id'];?>" method="post" id="myform">
				<div class="container">
				  <div class="panel panel-default">
				    <div class="panel-heading">
							<label> <?php echo $row['question'];?></label>
						</div>
				    <div class="panel-body">
							<?php if($row['choice1'] != '')
							{
								?>
								<label class="radio-inline">
									<input type="radio" name="ans" value="<?php echo $row['choice1'];?>" onclick="document.getElementById('myform').submit()"><?php echo $row['choice1'];?>
								</label>
								<?php
							}
							?>
							<?php if($row['choice2'] != '')
							{
								?>
								<label class="radio-inline">
									<input type="radio" name="ans" value="<?php echo $row['choice2'];?>" onclick="document.getElementById('myform').submit()"><?php echo $row['choice2'];?>
								</label>
								<?php
							}
							?>
							<?php if($row['choice3'] != '')
							{
								?>
								<label class="radio-inline">
									<input type="radio" name="ans" value="<?php echo $row['choice3'];?>" onclick="document.getElementById('myform').submit()"><?php echo $row['choice3'];?>
								</label>
								<?php
							}
							?>
							<?php if($row['choice4'] != '')
							{
								?>
								<label class="radio-inline">
									<input type="radio" name="ans" value="<?php echo $row['choice4'];?>" onclick="document.getElementById('myform').submit()"><?php echo $row['choice4'];?>
								</label>
								<?php
							}
							?>
							<?php if($row['choice5'] != '')
							{
								?>
								<label class="radio-inline">
									<input type="radio" name="ans" value="<?php echo $row['choice5'];?>" onclick="document.getElementById('myform').submit()"><?php echo $row['choice5'];?>
								</label>
								<?php
							}
							?>
						
						</div>
				  </div>
				</div>
</form>

</form>
</body>
</html>
