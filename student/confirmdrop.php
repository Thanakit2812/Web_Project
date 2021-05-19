<?php 
    session_start();
    include("../database/database.php");
    $username = $_SESSION['studentcode'];
    if (!isset($_SESSION['studentcode'])) {
        header('location: login_student.php');
    }
    $code = $_GET["code"];
    $sqlcheckdropcode = "select * from register WHERE studentcode = '$username' && course_id = '$code'" ;  
    $query = mysqli_query($conn,$sqlcheckdropcode);
    if (mysqli_num_rows($query) == 1) {
        $dropcode  = '
        DELETE FROM register
        WHERE studentcode  = ' .  $username . ' &&  course_id   = '.$code.';
        ';
        if (mysqli_query($conn,  $dropcode)) {
            echo "<script>alert('Delete Success')</script>";
            header("Refresh:0; url=drop.php");
        } else {
            echo mysqli_error($conn);
            echo "<script>alert('Delete failed'')</script>";
            header("Refresh:0; url=drop.php");
        }

    } else {
        echo "<script>alert('ไม่ได้ลงทะเบียนไว้')</script>";
        header("Refresh:0; url=Drop.php");
    }
mysqli_close($conn); // ปิดฐานข้อมูล
?>