<?php
session_start();
if (!isset($_SESSION['teachercode'])) {
  header('location: login_teacher.php');
}
include("../database/database.php");

$course = $_GET["teaching_subject"];
$delete_course = "DELETE FROM course WHERE course_id  = $course";
$delete_register = "DELETE FROM register WHERE course_id  = $course";
    if (mysqli_query($conn, $delete_register) && mysqli_query($conn, $delete_course) ) {
        header("Refresh:0; url=teaching_subject.php");
    } else {
        echo mysqli_error($conn);
        echo "<script>alert('Delete failed'')</script>";
    }
?>