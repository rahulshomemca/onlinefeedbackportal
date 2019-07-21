<?php
include('../include/dbcon.php');
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thank You</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2></h2>
  <div class="alert alert-success">
    <strong>Thank You!</strong> for giving your feedback!!
  </div>
</div>
<meta http-equiv="refresh" content="1; URL='index.php'" />
</body>
</html>
