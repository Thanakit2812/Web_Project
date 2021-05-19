<?php 
session_start();
include("../database/database.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password = md5($password);
    $query = "SELECT * FROM student WHERE studentcode  = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['studentcode'] = $username ;
        setcookie("cookiestudentcode","$username", time() + 3600);
        header("location: home_student.php");
    } else {
        echo "<script>alert('ไม่พบ')</script>";
        header("Refresh:0; url=login_student.html"); 
    }
?>