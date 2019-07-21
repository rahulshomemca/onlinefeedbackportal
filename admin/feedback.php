<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
	$qry = "SELECT * FROM questions;";
	$result = $mysqli->query($qry) or die(error.__LINE__);
	$cnt = mysqli_num_rows($result);


?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Manage Feedback</h2>
  <p>Welcome Admin</p>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="dash.php"> Admin Dashboard</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="add.php">Add Question</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="view_feedback.php">Feedback All Feedback</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="store.php">Clear Feedback</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Log Out</a></li>
    </ul>
  </div>
</div>
<br>
<div class="container">
  <h2>Question List</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th width="180">Question No.</th>
        <th>Question</th>
        <th width="100"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php
        for($i=0;$i<$cnt;$i=$i+1)
        {
          $row = $result->fetch_assoc();
          ?>
        <td><?php echo $row['q_no'] ?></td>
        <td><?php echo $row['question'] ?></td>
        <td><a href="edit.php?id=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-edit"></span></a> |
            <a href="delete.php?id=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
      </tr>
      <?php
        }
        ?>
    </tbody>
  </table>
</div>
</body>
</html>
