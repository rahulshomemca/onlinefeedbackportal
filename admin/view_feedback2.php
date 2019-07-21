<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}
  $id = $_GET['id'];
	$query = "SELECT * FROM feedback WHERE `faculty_id` = '$id';";
	$res = $mysqli->query($query) or die(error.__LINE__);
	$cnt = mysqli_num_rows($res);


?>
<!DOCTYPE html>
<html>
<head>
    <title>View Feedback</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>View Feedbacks</h3>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="feedback.php">Back To Manage Feedback</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="dash.php">Admin Dashboard</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Log Out</a></li>
    </ul>
  </div>
</div>
<br>
<div class="container">
  <p>Type something in the input field to search the table for Names, Email or Department:</p>
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Faculty Name</th>
        <th>Student Name</th>
        <th>USN</th>
				<th>Question</th>
        <th>Answar</th>
      </tr>
    </thead>
    <tbody id="myTable">
    <?php
			for($i=0;$i<$cnt;$i=$i+1)
			{
				$row = $res->fetch_assoc();
				?>
      <tr>
        <td><?php echo $row['faculty_name'] ?></td>
        <td><?php echo $row['student_name'] ?></td>
        <td><?php echo $row['usn'] ?></td>
				<td><?php echo $row['question'] ?></td>
				<td><?php echo $row['answar'] ?></td>
      </tr>
      <?php
        }
        ?>
    </tbody>
  </table>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>
