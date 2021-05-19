<?php
    session_start();
    include("../database/database.php");
    if (!isset($_COOKIE['cookiestudentcode'])&&!isset($_SESSION['studentcode'])) {
      header('location: login_teacher.php');
  }
  if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['studentcode']);
      unset($_COOKIE["cookiestudentcode"]);
      // setcookie("cookiestudentcode","", time() -3600);
      header('location: login_teacher.php');
  }
  if(isset($_SESSION['studentcode'])){
      $username = $_SESSION['studentcode'];
      setcookie("cookiestudentcode","$username", time() + 3600);
  }else{
      $username = $_COOKIE["cookiestudentcode"];
      $_SESSION['studentcode'] = $_COOKIE["cookiestudentcode"];
      setcookie("cookiestudentcode","$username", time() + 3600);
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu|Lora">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse" style="background-color: #FF7800;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">KMUTNB</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="student_list.php">Student list</a></li>
        <li><a href="teaching_subject.php">Teaching subject</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="student_list.php?logout='1'" style="color: white;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  <h3>Collapsible Navbar</h3>
  <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
  <p>Only when the button is clicked, the navigation bar will be displayed.</p>
</div>

</body>
</html>
