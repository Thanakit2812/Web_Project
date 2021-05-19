<?php
session_start();
if (!isset($_SESSION['teachercode'])) {
  header('location: login_teacher.php');
}
include("../database/database.php");
$course = $_GET["teaching_subject"];
$query = "SELECT * FROM course WHERE course_id  = '$course' LIMIT 1";
$result = mysqli_query($conn, $query);
if(strlen($course)<6){
    echo 'ยังขาดอีก '.(6-strlen($course)).' ตัว';
}else{
    if (mysqli_num_rows($result) == 1) {
        echo "ไม่สามารถใช้ได้ ซ้ำ ";
    } else {
        echo "สามารถใช้ได้";
    }
}
?>