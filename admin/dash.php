<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}

	$qry = "SELECT * FROM facultty;";
	$result = $mysqli->query($qry) or die(error.__LINE__);
	$cnt = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>Admin Dashboard<button type="button" class="btn btn-primary" style="float:right;" onclick="check()">Reset Ordering & Active</button></h3>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="managestudent.php">Manage Student</a></li>
      <li role="presentation" class="divider"></li>
			<li role="presentation"><a role="menuitem" tabindex="-1" href="add_faculty.php">Add Faculty</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="delete_faculty.php">Delete Faculty</a></li>
			<li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="feedback.php">Manage Feedback</a></li>
			<li role="presentation" class="divider"></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="password.php?email=<?php echo $_SESSION['email']?>">Change Password</a></li>
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
        <th>Name</th>
        <th>Email</th>
				<th>Department</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="myTable">
    <?php
			for($i=0;$i<$cnt;$i=$i+1)
			{
				$row = $result->fetch_assoc();
				?>
      <tr>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['email'] ?></td>
				<td><?php echo $row['dept'] ?></td>
        <td align="center"><a href="edit_faculty.php?email=<?php echo $row['email'] ?>"><button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-edit"></span> Edit
        </button></a> <a href="view_feedback2.php?id=<?php echo $row['id'] ?>"><button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-info-sign"></span> Feedback
        </button></a></td>

      </tr>
      <?php
        }
        ?>
    </tbody>
  </table>

</div>
<script>
	function check()
	{
		var res = confirm("Are you sure do you want to reset?");
		if(res == true)
		{
			window.open('reset.php');
		}
		else
		{
			return false;
		}
	}
</script>
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
