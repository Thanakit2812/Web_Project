<?php
session_start();
include("../database/database.php");
if (!isset($_COOKIE['cookiestudentcode']) && !isset($_SESSION['studentcode'])) {
  header('location: login_student.php');
}
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['studentcode']);
  unset($_COOKIE["cookiestudentcode"]);
  setcookie("cookiestudentcode","", time() -3600);
  header('location: login_student.php');
}

if (isset($_SESSION['studentcode'])) {
  $username = $_SESSION['studentcode'];
  setcookie("cookiestudentcode", "$username", time() + 3600);
} else {
  $username = $_COOKIE["cookiestudentcode"];
  $_SESSION['studentcode'] = $_COOKIE["cookiestudentcode"];
  setcookie("cookiestudentcode", "$username", time() + 3600);
}

$query = "SELECT course.course_id ,course.title,course.credit,teacher.firstName,teacher.surname 
              FROM course INNER JOIN teacher ON course.teachercode = teacher.teachercode WHERE status ='on'";
$result = mysqli_query($conn, $query);

$query2 = "SELECT * FROM student WHERE studentcode = '$username'";
$result2 = mysqli_query($conn, $query2);
$objResult2 = mysqli_fetch_array($result2);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/default_style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu|Lora">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
        <a class="navbar-brand" href="home_student.php">KMUTNB</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="home_student.php">Home</a></li>
          <li><a href="schedule.php">Class schedule</a></li>
          <li><a href="subject.php">Subjects</a></li>
          <li><a href="register.php">Register</a></li>
          <li><a href="drop.php">Drop class</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="# " style="color: white;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div style="text-align:center;">
      <p>Name
        <?php echo $objResult2["firstname"] . ' ' . $objResult2["surname"] . ' ID : ' . $objResult2["studentcode"] ?>
      </p>
      <h3>Class schedule</h3>
      <div>
        <input type="text" id="myInput" class="form-control" style="width:30%; margin : auto; border-radius: 8px;">
      </div>
      <br>
      <table class="table table-bordered" style="width:80% ; margin: auto;">
        <thead>
          <tr>
            <th width="10%" scope="col">#</th>
            <th width="15%" scope="col">Subject ID</th>
            <th width="25%" scope="col">Subject</th>
            <th width="15%" scope="col">Credit</th>
            <th width="35%" scope="col">Teacher</th>
          </tr>
        </thead>
        <tbody id="myTable">
          <?php
          $i = 1;
          if (mysqli_num_rows($result) == 0) {
            echo '<tr><td colspan="5">ไม่มีวิชาที่เปิดสอน</td></tr>';
          } else {
            while ($objResult = mysqli_fetch_array($result)) {
          ?>
              <tr>
                <td>
                  <div align="center"><?php echo $i; ?></div>
                </td>
                <td><?php echo $objResult["course_id"]; ?></td>
                <td><?php echo $objResult["title"]; ?></td>
                <td><?php echo $objResult["credit"]; ?></td>
                <td><?php echo $objResult["firstName"] . ' ' . $objResult["surname"]; ?></td>
              </tr>
          <?php
              $i++;
            }
          } ?>
        </tbody>
      </table>
      </br>
    </div>
  </div>

</body>

</html>