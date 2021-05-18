<?php
include("../database/database.php");
$name = $_POST["firstname"];
$surname = $_POST["surname"];
$password = $_POST["password"];
$re_password= $_POST["re_password"];
$address = $_POST["address"];
$district = $_POST["district"];
$subdistrict = $_POST["subdistrict"];
$Postal = $_POST["post"];
$tel = $_POST["tel"];
$studentcode = $_POST["studentcode"];
$province = $_POST["province"];
if($password != $re_password){
    echo "<script>alert('password ไม่เหมือนกัน ')</script>";
    header("Refresh:0; url=register_student.html");
}else{
    $password = md5($password);
    $sqlcheckuser = "select * from student WHERE studentcode = '$studentcode' LIMIT 1" ;
    $query = mysqli_query($conn, $sqlcheckuser);
    if (mysqli_num_rows($query) == 1) {
        echo "<script>alert('ซ้ำ')</script>";
        header("Refresh:0; url=register_student.html");
    }else {
        $insert_sql = "INSERT INTO student VALUES ('$studentcode','$password','$name','$surname','$address','$district','$subdistrict','$Postal','$province','$tel'); ";
        if(mysqli_query($conn, $insert_sql)) {
            echo "<script>alert('สมัครเสร็จสมบูรณ์')</script>";
            header("Refresh:0; url=../index.html");
        }
        else {
            echo mysqli_error($conn);
        }
    }
}

?>