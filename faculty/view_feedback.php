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
  <h2>Feedback</h2>
  <p>Faculty Name : <strong>Rahul Shome</strong></p>
  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Manage
    <span class="caret"></span></button>
    <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="dash.php">Admin Dashboard</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Log Out</a></li>
    </ul>
  </div>
</div>
<br>

<div class="container">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th><strong>Question 1</strong> : Who is Modi?</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td><strong>Name : </strong>Rahul Shome <strong>USN : </strong>1RZ17MCA36 <strong>Answar : </strong>Good<br> </td>
      </tr>
    </tbody>
  </table>
</div>
<div class="container">
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th><strong>Bad</strong></th>
        <th><strong>Good</strong></th>
        <th><strong>Neutral</strong></th>
        <th><strong>Very Good</strong></th>
      </tr>
    </thead>
    <tbody id="myTable">
      <tr>
        <td>5</td>
        <td>7</td>
        <td>7</td>
        <td>4</td>
      </tr>
    </tbody>
  </table>

</div>
</body>
