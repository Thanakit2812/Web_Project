<?php
    session_start();
    include("../database/database.php");
    if (!isset($_COOKIE['cookiestudentcode'])&&!isset($_SESSION['studentcode'])) {
      header('location: login_student.php');
  }
  if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['studentcode']);
      unset($_COOKIE["cookiestudentcode"]);
      setcookie("cookiestudentcode","", time() -3600);
      header('location: login_student.php');
  }
  
  if(isset($_SESSION['studentcode'])){
      $username = $_SESSION['studentcode'];
      setcookie("cookiestudentcode","$username", time() + 3600);
  }
  if (isset($_COOKIE["cookiestudentcode"])) {
    $username = $_COOKIE["cookiestudentcode"];
    $_SESSION['studentcode'] = $_COOKIE["cookiestudentcode"];
    setcookie("cookiestudentcode", "$username", time() + 3600);
  }
  if(isset($_POST['add'])){
      $code = $_POST["code"];
      $sqlcheckcourse = "SELECT * FROM register WHERE studentcode='$username' && course_id ='$code'";
      $resultcheckcourse = mysqli_query($conn, $sqlcheckcourse) or die("Error Query [" . $sqlcheckcourse . "]");
      if(mysqli_num_rows($resultcheckcourse) != 0){
         echo "<script>alert('ซ้ำ')</script>";
      }else{
          $addcourse = " INSERT INTO register VALUES ('$username','$code');";
          if(mysqli_query($conn,  $addcourse)) {
              echo "<script>alert('Success')</script>";
          }
          else {
              echo "<script>alert('failed')</script>";
          }
      }

  }
    $query = "SELECT * FROM register INNER JOIN report_course ON register.course_id =report_course.coursecode WHERE register.studentcode='$username'";
    $result = mysqli_query($conn, $query);
    // เอาชื่อ
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
        <li><a href="register.php?logout='1'" style="color: white;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
</nav>
    <div style="text-align:center;">
                <p>Name
                    <?php echo $objResult2["firstname"].' '. $objResult2["surname"].' ID : '. $objResult2["studentcode"]?>
                </p>
                <h3>Class schedule</h3>
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
                    <tbody>
                        <?php
                            $i = 1;
                            $c = 0;
                            if (mysqli_num_rows($result) == 0) {
                                echo '<tr><td colspan="5">ไม่มีการลงทะเบียนไว้</td></tr>';
                              }else{
                            while ($objResult = mysqli_fetch_array($result)) {
                            ?>
                        <tr>
                            <td>
                                <div align="center"><?php echo $i; ?></div>
                            </td>
                            <td><?php echo $objResult["coursecode"]; ?></td>
                            <td><?php echo $objResult["name"]; ?></td>
                            <td><?php echo $objResult["credit"];?> </td>
                            <td><?php echo $objResult["names"].' '.$objResult["Lname"]; ?></td>
                            <!-- <td><?php $c+=$objResult["credit"];?> </td> -->
                        </tr>
                        <?php $i++;}
                    }?>
                    </tbody>
                </table>
                </br>
                <h3>Register</h3>
                <p>Subject ID</p>
                <form action="register.php" method="POST">
                    <input type="text" name="code" pattern="[0-9]{6}" placeholder="xxxxxx">
                    <button id="button" name="add"><a>submit</a></button>
                    </br></br>
                    </from>
            </div>
  </div>
</nav>

</body>
</html>