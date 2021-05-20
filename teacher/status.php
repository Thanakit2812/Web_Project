<?php
session_start();
if (!isset($_SESSION['teachercode'])) {
  header('location: login_teacher.php');
}
include("../database/database.php");
$course = $_GET["teaching_subject"];
$status = $_GET["status"];
$UPDATE_course = "
    UPDATE course
    SET status = '" .$status . "'
    WHERE course_id   = " . $course . "; ";
    if (mysqli_query($conn, $UPDATE_course)) {
        header("Refresh:0; url=teaching_subject.php");
    }else{
        echo mysqli_error($conn);
        echo "<script>alert('failed'')</script>";
    }
?>