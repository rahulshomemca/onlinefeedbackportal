<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}


	$query = "SELECT * FROM feedback ";
	$res = $mysqli->query($query) or die(error.__LINE__);
	$cnt = mysqli_num_rows($res);

  if(isset($_POST['submit']))
  {
    $usn = $_POST['usn'];
    $qry = "DELETE FROM `feedback` WHERE `usn` LIKE '$usn%'";
		$result = $mysqli->query($qry) or die(error.__LINE__);
					if($result == true)
					{
						?>  <br>
							<div class="container">
							  <div class="alert alert-success">
								<strong>Success!</strong> Record Deleted!!
							  </div>
							</div>
						<?php
					}
					else
					{
						?>  <br>
							<div class="container">
							  <div class="alert alert-danger">
								<strong>Failed!</strong> Record Not Deleted!!
							  </div>
							</div>
						<?php
					}
			
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Records</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h3>Delete Record<button type="button" class="btn btn-primary" style="float:right;" onclick="check()">Clear Feedback</button></h3>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="feedback.php">Manage Feedback</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Log Out</a></li>
    </ul>
  </div>
</div>
<br>
<div class="container">

  <p>Enter Particular USN or LIKE USN to delete e.g. 1RV17MCA / 1RZ17MCA..</p>
  <form class="form-inline" action="store.php" method="post">
    <div class="form-group">
      <label for="usn">USN:</label>
      <input type="text" class="form-control" id="usn" placeholder="Enter USN" name="usn">
    </div>
    <input type="submit" class="btn btn-default" name="submit">
  </form>
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
        <th>DELETE</th>
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
        <td align="center"><a href="delete_r.php?id=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
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
			window.open('clean.php');
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
