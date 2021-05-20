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
    
    <script>
        async function getDataFromAPI() {

            let response = await fetch('../json/student/student.php')
            let rawData = await response.text()
            let objectData = JSON.parse(rawData)
            let result = document.getElementById('result')
            //console.log(objectData)
            for (let i = 0; i < objectData.student.length; i++) {
                let TR = document.createElement('tr')
                TR.innerHTML = "<td>" + objectData.student[i].studentcode + "</td>" + "<td>" + 
                objectData.student[i].firstname + "</td>" + "<td>" + objectData.student[i].surname + 
                "</td>" + "<td>" + objectData.student[i].tel + "</td>" + "<td>" + objectData.student[i].province + 
                "</td>" + "<td>" + objectData.student[i].postal + "</td>"
                document.getElementById('tb').appendChild(TR)
            }
        }
        getDataFromAPI()
    </script>

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
        <h3>Student list</h3>
        <table class="table" id="tb">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAME</th>
                    <th scope="col">SURNAME</th>
                    <th scope="col">PHONE NUMBER</th>
                    <th scope="col">PROVNCE</th>
                    <th scope="col">POSTAL CODE</th>
                </tr>
            </thead>
        </table>

    </div>

</body>

</html>