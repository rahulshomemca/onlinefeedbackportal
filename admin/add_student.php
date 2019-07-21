<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(isset($_SESSION['email']))
	{
		if(isset($_POST['submit']))
		{
			$email = $_POST['email'];
            $name = $_POST['name'];
            $usn = $_POST['usn'];
            
			$chk = "SELECT * FROM student WHERE `email`='$email' AND `usn`='$usn';";
			$res = $mysqli->query($chk) or die(error.__LINE__);
			$cnt1 = mysqli_num_rows($res);
			if($cnt1 > 0)
			{
				?>  <br>
                    <div class="container">
                      <div class="alert alert-danger">
                        <strong>Failed!</strong> Account Already Exists!!
                      </div>
                    </div>
                <?php
			}
			else
			{  
			    $str = 'wzsrdcf';
                $shuffled = str_shuffle($str);
			    
			    $password =$shuffled.rand(546768,999999);
                $pas = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));
                $subject = "Login Information";
                $message = "Your Account is Sucessfully Created And Password has been set to $password";
                $from = "From: Rahul Shome<rahulshomernp@gmail.com>";

                mail($email, $subject, $message, $from);
                
				$qry = "INSERT INTO `student`(`email`,`usn`,`name`,`password`) VALUES ('$email','$usn','$name','$pas');'";
				$result = $mysqli->query($qry) or die(error.__LINE__);
				if($result)
				{
					?>  <br>
						<div class="container">
						  <div class="alert alert-success">
							<strong>Success!</strong> Student Added!!
						  </div>
						</div>
					<?php
				}
				else
				{
					?>  <br>
						<div class="container">
						  <div class="alert alert-danger">
							<strong>Failed!</strong> Student Not Added!!
						  </div>
						</div>
					<?php
				}
			}

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
    <title>Add Student</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Student</h2>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="dash.php"> Admin Dashboard</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="managestudent.php">Manage Student</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Log Out</a></li>
    </ul>
  </div>
</div>
<br>
<div class="container">
<p>Enter New Student's details to add</p>
<form class="form-inline" method="post" action="add_student.php">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" placeholder="Enter Name..." name="name">
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" placeholder="abc@rvce.edu.in" name="email">
  </div>
  <div class="form-group">
    <label for="usn">USN:</label>
    <input type="text" class="form-control" id="usn" placeholder="Enter USN..." name="usn">
  </div>
  <input type="submit" class="btn btn-default" name="submit" value="ADD">
</form>
</div>
</body>
