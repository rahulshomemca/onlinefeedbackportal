<!DOCTYPE html>
<html>
<head>
  <title>Online Feedback Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative;
  }
  #section1 {padding-top:50px;height:600px;}
  #section2 {padding-top:50px; padding-left: 80px; padding-right: 80px;height:auto; padding-bottom: 80px; color: #fff; background-color: #5DBCD2;}
  #section3 {padding-top:30px;height:; padding-bottom: 30px; color: #fff; background-color: black;}
  </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Online Feedback Portal</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#section1">HOME</a></li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Login<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="student/index.php">Student</a></li>
              <li><a href="faculty/index.php">Faculty</a></li>
              <li><a href="admin/index.php">Admin</a></li>
            </ul>
          </li>
          <li><a href="#section2">Why Feedback</a></li>
          <li><a href="#section3">About Us</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div id="section1" class="container-fluid">
  <img src="image/img.jpg" class="image-responsive" height="100%" width="100%">
</div>
<div id="section2" class="container-fluid">
<h2><b>Introduction</b></h2>
Another way to gather feedback from your students is to have them complete an anonymous, online survey about the course.
 The kinds of questions you can ask on such a survey are the same ones you would ask on an in-class feedback form,
 so please see the above sample forms for ideas.

<h2><b>Method</b></h2>
At Vanderbilt, the OAK (Online Access to Knowledge) course management system (powered by Blackboard) can facilitate an anonymous,
 online survey. Instructions for surveying your students via OAK are available from the University of Oregon’s Teaching Effectiveness
 Program.

<h3><b>Pros and Cons</b></h3>
Since students type, rather than write by hand, their responses, online surveys can do a better job of preserving your students’
anonymity and thus increase their ability to be honest in their responses. However, online surveys often have lower response rates
than in-class surveys, unless you provide your students with some incentive to respond. (Blackboard can tell you which students have
 completed your survey without letting you know individual student responses.)
</div>
<div id="section3" class="container-fluid">
    <div class="col-sm-4">
      This is Online Feedback Portal for the Students of MCA Department of RV College of Engineering.
    </div>
    <div class="col-sm-4">
      <p>Quick Links</p>
      <a href="student/index.php" style="text-decoration:none; color:white;">Student</a><br>
      <a href="faculty/index.php" style="text-decoration:none; color:white;">Faculty</a><br>
      <a href="admin/index.php" style="text-decoration:none; color:white;">Admin</a>
    </div>
    <div class="col-sm-4">
      R V College of Engineering<br>
      R V Vidyanikethan Post<br>
      Mysuru Road Bengaluru - 560 059<br>
      Ph : 91 - 080-6717 8021<br>
      Fax: 91 - 080-6717 8011<br>
      Email : principal@rvce.edu.in
    </div>
</div>

<script>
$(document).ready(function(){
    $('body').scrollspy({target: ".navbar", offset: 50});
});
</script>

</body>
</html>
