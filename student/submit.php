<?php include '../include/dbcon.php';?>
<?php
session_start();

	if(!isset($_SESSION['email']))
	{
		header('location:index.php');
	}

  $id = $_GET['id'];
  $order_id= $_SESSION['order_id'];
  $ans = $_POST['ans'];

  $qry = "SELECT * FROM `questions` WHERE `id` = '$id';";
  $res = $mysqli->query($qry) or die(error.__LINE__);
  $detail = $res->fetch_assoc();

  $email = $_SESSION['email'];
	$query = "SELECT * FROM `student` WHERE `email`='$email';";
	$res = $mysqli->query($query) or die(error.__LINE__);
  $del = $res->fetch_assoc();

  $que = "SELECT * FROM `facultty` WHERE `order_id`='$order_id';";
	$qr = $mysqli->query($que) or die(error.__LINE__);
  $faculty = $qr->fetch_assoc();

  	$question = $detail['question'];

  	$usn = $del['usn'];
  	$name = $del['name'];
  	$f_id = $faculty['id'];
  	$f_name = $faculty['name'];

        $qry11 = "SELECT * FROM `feedback` WHERE `faculty_id`= '$f_id' AND `usn` = '$usn' AND `question` = '$question';";
		$res11 = $mysqli->query($qry11) or die(error.__LINE__);
		$cnt11 = mysqli_num_rows($res11);
		if($cnt11 == 0)
		{
  	        $ins = "INSERT INTO `feedback`(`faculty_id`,`faculty_name`, `usn`, `student_name`, `question`, `answar`) VALUES ('$f_id','$f_name','$usn','$name','$question','$ans');";
  	        $feed = $mysqli->query($ins) or die(error.__LINE__);
		}
		else
		{
		    $qry12 = "UPDATE `feedback` SET `answar` = '$ans' WHERE `faculty_id`= '$f_id' AND `usn` = '$usn' AND `question` = '$question';";
		    $result12 = $mysqli->query($qry12) or die(error.__LINE__);
		    
		}
  	
  	
  	
  	
		$_SESSION['q_no'] = $_SESSION['q_no'] + 1;

		if($_SESSION['cnt'] < $_SESSION['q_no'])
	    {
			$_SESSION['order_id'] = $_SESSION['order_id'] + 1;

			if($_SESSION['order_id'] > $_SESSION['f_cnt'])
			{
				header('location:close.php');
			}
			$_SESSION['q_no'] = 1;

			?>

			<meta http-equiv="refresh" content="0; URL='dash.php?q_no=<?php echo $_SESSION['q_no']; ?>'" />

			<?php
		}
		else
		{
			?>

			<meta http-equiv="refresh" content="0; URL='dash.php?q_no=<?php echo $_SESSION['q_no']; ?>'" />

			<?php
		}

?>
