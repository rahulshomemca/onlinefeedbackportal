<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(isset($_SESSION['id']))
	{
		$pass = $_POST['otp'];
		$id = $_SESSION['id'];
		
		
    $cpas = $_POST['npwd'];
    $cpass = password_hash($cpas, PASSWORD_BCRYPT, array('cost' => 10));
    
    $cnpas = $_POST['ncpwd'];
    $cnpass = password_hash($cnpas, PASSWORD_BCRYPT, array('cost' => 10));
    
    $qry = "SELECT * FROM admin WHERE `id` = '$id';";
  	$result = $mysqli->query($qry) or die(error.__LINE__);
    $row = mysqli_fetch_assoc($result);
    
    $otp = $_SESSION['otp'];
    if($cpas == '' || $cnpas == '')
    {
        ?>  <br>
  							<div class="container">
  							  <div class="alert alert-danger">
  								<strong>Failed!</strong> Password Cannot be blank!!
  							  </div>
  							    <meta http-equiv="refresh" content="1; URL='password.php?email=<?php echo $_SESSION['email']?>'" />
                                 <?php echo "If you are not redirected yet , "?><a href="password.php?email=<?php echo $_SESSION['email']?>">Click Here</a>
                                
  							</div>
  		<?php
    }
    else
    {
	if(password_verify($pass, $otp))
    {
      if($cpas == $cnpas)
      {
          
        $qry = "UPDATE `admin` SET `password` = '$cpass' WHERE `id` = '$id';";
  		$result = $mysqli->query($qry) or die(error.__LINE__);
  					if($result == true)
  					{
  					    	session_destroy();
  						?>
  					
  						<br>
  							<div class="container">
  							  <div class="alert alert-success">
  								<strong>Success!</strong> Password Sucessfully Changed!!
  							  </div>
  							    <meta http-equiv="refresh" content="1; URL='index.php'" />
                                <?php echo "If you are not redirected yet , "?><a href="index.php">Click Here</a>
                                
  							</div>
  						<?php
  						
  					}
  					else
  					{
  						?>  <br>
  							<div class="container">
  							  <div class="alert alert-danger">
  								<strong>Failed!</strong> Failed to change Password!!
  							  </div>
  							   <meta http-equiv="refresh" content="1; URL='password_r.php" />
                                 <?php echo "If you are not redirected yet , "?><a href="password_r.php">Click Here</a>
  							</div>
  						<?php
  					}
          }
          else 
          {
            ?>  <br>
              <div class="container">
                <div class="alert alert-danger">
                <strong>Failed!</strong> Both password must match!!
                </div>
                                <meta http-equiv="refresh" content="1; URL='password_r.php" />
                                 <?php echo "If you are not redirected yet , "?><a href="password_r.php">Click Here</a>
              </div>
            <?php
          }
    }
    else 
    {
      ?>  <br>
        <div class="container">
          <div class="alert alert-danger">
          <strong>Failed!</strong> Current Password is wrong!!
          </div>
                          <meta http-equiv="refresh" content="1; URL='password_r.php" />
                                 <?php echo "If you are not redirected yet , "?><a href="password_r.php">Click Here</a>
        </div>
      <?php
    }

	}
	}
	else
	{
		header('location:forgetpass.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Password Change Status</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

</body>
</html>
