<?php
session_start();
include("../database/database.php");
if (!isset($_SESSION['teachercode'])) {
  header('location: login_teacher.php');
}

if(isset($_POST['submit'])){
    $Courseid = $_POST["Courseid"];
    $NameCourse = $_POST["NameCourse"];
    $credit = $_POST["credit"];
    $teachercode = $_SESSION['teachercode'];

    $query = "SELECT * FROM course WHERE course_id  = '$Courseid' LIMIT 1";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1 ){
        echo "<script>alert('ไม่สามารถใช้ได้ ซ้ำ')</script>";
        header("Refresh:0; url=addteaching_subject.php");
        
    }
    $insert_sql = "INSERT INTO course VALUES ('$Courseid','$NameCourse','$credit','$teachercode','on'); ";
    if(mysqli_query($conn, $insert_sql)) {
        // echo "<script>alert('OK')</script>";
        header("Refresh:0; url=teaching_subject.php");
    }
    else {
        echo mysqli_error($conn);
    }
  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Add Course</title>

    <script>
    var httpRequest;

    function send() {
        httpRequest = new XMLHttpRequest();
        httpRequest.onreadystatechange = showResult;
        var a = document.getElementById("Courseid").value;
        var url = "checkteaching_subject.php?teaching_subject=" + a;
        httpRequest.open("GET", url);
        httpRequest.send();
    }

    function showResult() {
        if (httpRequest.readyState == 4 && httpRequest.status == 200) {
            document.getElementById("result").innerHTML = httpRequest.responseText;
        }
    }
    </script>
    <style>
        h3 {
            text-align: center;
        }
     
    </style>


</head>

<body>
    <h3>Add Course </h3>
    <center>
    <form action="addteaching_subject.php" method="POST" enctype="multipart/form-data">
        <p>ID Course</p>
        <input type="text" class="form-input" name="Courseid" id="Courseid" placeholder="ID Course " pattern="[0-9]{6}"
            onkeyup="send()" required />
        <span id="result"></span>
        <p>Name Course</p>
        <input type="text" class="form-input" name="NameCourse" id="NameCourse" placeholder="Name Course"
            pattern="[a-zA-Z]{1,}" required />
        <p>credit Course</p>
        <input type="text" class="form-input" name="credit" id="credit" placeholder="credit" pattern="[0-9]{1,}"
            required /><br><br>
            
        <input type="submit" name="submit" class="btn btn-info" value="Done" />
    </form>

</body>

</html>