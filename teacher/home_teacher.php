<?php
session_start();
include("../database/database.php");
if (!isset($_COOKIE['cookiesteachercode']) && !isset($_SESSION['teachercode'])) {
  header('location: login_teacher.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['teachercode']);
  unset($_COOKIE["cookieteachercode"]);
  setcookie("cookieteachercode","", time() -3600);
  header('location: login_teacher.php');
}
if (isset($_SESSION['teachercode'])) {
  $teachercode = $_SESSION['teachercode'];
  setcookie("cookieteachercode", "$teachercode", time() + 3600);
} else {
  $teachercode = $_COOKIE["cookieteachercode"];
  $_SESSION['teachercode'] = $_COOKIE["cookieteachercode"];
  setcookie("cookieteachercode", "$teachercode", time() + 3600);
}
$query2 = "SELECT * FROM teacher WHERE teachercode = '$teachercode'";
$result2 = mysqli_query($conn, $query2);
$objResult2 = mysqli_fetch_array($result2);
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

<body style="background-color:#FFF1E2">

  <nav class="navbar navbar-inverse" style="background-color: #FF7800;">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="home_teacher.php">KMUTNB</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="home_teacher.php">Home</a></li>
          <li><a href="student_list.php">Student list</a></li>
          <li><a href="teaching_subject.php">Teaching subject</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="home_teacher.php?logout='1'" style="color: white;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <h3>ยินดีต้อนรับ</h3>
    <p><?php echo $objResult2["firstname"] . ' ' . $objResult2["surname"] ?></p>
    <p><?php echo ' ID : ' . $objResult2["teachercode"] ?></p>
    <p><?php echo ' TEL : ' . $objResult2["tel"] ?></p>
  </div>
</body>

</html>