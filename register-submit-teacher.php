<?php
include("../Web_Project/database/database.php");
$name = $_POST["firstname"];
$surname = $_POST["surname"];
$password = $_POST["password"];
$re_password= $_POST["re_password"];
$tel = $_POST["tel"];
$teachercode = $_POST["teachercode"];





if($password != $re_password){
    echo "<script>alert('password ไม่เหมือนกัน ')</script>";
    header("Refresh:0; url=register_teacher.html");
}else{
    $password = md5($password);
    $sqlcheckuser = "select * from teacher WHERE teachercode = '$teachercode' LIMIT 1" ;
    $query = mysqli_query($conn, $sqlcheckuser);
    if (mysqli_num_rows($query) == 1) {
        echo "<script>alert('ซ้ำ')</script>";
        header("Refresh:0; url=register_teacher.html");
    }else {
        $insert_sql = "INSERT INTO teacher VALUES ('$teachercode','$password','$name','$surname','$tel'); ";
        if(mysqli_query($conn, $insert_sql)) {
            echo "<script>alert('สมัครเสร็จสมบูรณ์')</script>";
            header("Refresh:0; url=index.html");
        }
        else {
            echo mysqli_error($conn);
        }
    }
}

?>