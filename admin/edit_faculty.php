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
    <title>Edit Faculty</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Change Faculty</h2>
  <p><strong>Faculty</strong> : <?php echo $row['name']?></p>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="dash.php"> Admin Dashboard</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="delete_faculty.php">Delete Faculty</a></li>
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
      <input type="text" size="50" class="form-control" id="name" value="<?php echo $row['name']?>" name="name" readonly>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" size="50" class="form-control" id="email" value="<?php echo $row['email']?>" name="email" readonly>
    </div>
    <div class="form-group">
      <label for="order">Order Number:</label>
        <input type="text" size="20" class="form-control" id="order" value="<?php echo $row['order_id']?>" name="order">
    </div>
		<div class="form-group">
      <label for="sel1">Active Status (current) : <?php echo $row['active']?></label>
      <select class="form-control" id="sel1" name="active">
        <option>Select</option>
				<option>Active</option>
        <option>Inactice</option>
      </select>
    </div>
    <button type="submit" class="btn btn-default" name="submit">Submit</button>
  </form>
</div>

</body>
