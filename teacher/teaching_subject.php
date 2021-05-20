<?php
session_start();
include("../database/database.php");

if (!isset($_COOKIE['cookiesteachercode'])&&!isset($_SESSION['teachercode'])) {
    header('location: login_teacher.php');
  }
  if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['teachercode']);
      unset($_COOKIE["cookieteachercode"]);
      // setcookie("cookiestudentcode","", time() -3600);
      header('location: login_teacher.php');
  }
  if(isset($_SESSION['teachercode'])){
    $teachercode = $_SESSION['teachercode'];
      setcookie("cookiestudentcode","$teachercode", time() + 3600);
  }else{
    $teachercode= $_COOKIE["cookieteachercode"];
      $_SESSION['teachercode'] = $_COOKIE["cookieteachercode"];
      setcookie("cookieteachercode","$teachercode", time() + 3600);
  }
$sqlcoures = "SELECT * FROM `course` WHERE `teachercode` ='$teachercode';";
$objQuery = mysqli_query($conn, $sqlcoures) or die("Error Query [" . $sqlcoures . "]");

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
                    <li><a href="home_teacher.php?logout='1' " style="color: white;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Teaching subject</h3>
        <table class="table" id="tb">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Course_ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Credit</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($objResult = mysqli_fetch_array($objQuery)) {
                ?>
                    <tr>
                        <td>
                            <div align="center"><?php echo $i; ?></div>
                        </td>
                        <td><?php echo $objResult["course_id"]; ?></td>
                        <td><a href="show.php?teaching_subject=<?php echo $objResult["course_id"]; ?>"><?php echo $objResult["title"]; ?></a>
                        </td>
                        <td><?php echo $objResult["credit"]; ?></td>
                        <td><?php
                            if ($objResult["status"] == "on") {
                                echo '<a href="status.php?teaching_subject=' . $objResult["course_id"] . '&status=off"> <button type="submit" class="btn btn-success">open</button></a>';
                            } else {
                                echo '<a href="status.php?teaching_subject=' . $objResult["course_id"] . '&status=on"><button type="submit" class="btn btn-danger" id="myb">close</button></a>';
                            }
                            ?></td>
                        <td>
                            <a href="deleteteaching_subject.php?teaching_subject=<?php echo $objResult["course_id"]; ?>"><img src="../icon/trash-fill.svg" style="width:25px; height:25px;" alt="icon "> </a>
                            
                            <a href="updateteaching_subject.php?teaching_subject=<?php echo $objResult["course_id"]; ?>"><img src="../icon/pencil-square.svg" style="width:25px; height:25px;" alt="icon"> </a>
                        </td>

                    </tr>
                <?php
                    $i++;
                } ?>
            </tbody>
        </table>
        <div>
            <a href="addteaching_subject.php"><button type="submit" class="btn btn-primary">Add Course</button></a>
        </div>
    </div>

</body>

</html>