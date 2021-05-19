<?php 
session_start();
include("../database/database.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = md5($password);
    $query = "SELECT * FROM teacher WHERE teachercode  = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['teachercode'] = $username ;
        setcookie("cookieteachercode","$username", time() + 3600);
        header("location: home_teacher.php");
        
    } else {
        echo "<script>alert('ไม่พบ')</script>";
        header("Refresh:0; url=login_teacher.php"); 
    }
?>