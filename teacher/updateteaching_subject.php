<?php
session_start();
include("../database/database.php");
if (!isset($_SESSION['teachercode'])) {
  header('location: login_teacher.php');
}
if(isset($_POST['submit'])){
    $Courseid = mysqli_real_escape_string($conn, $_POST['Courseid']);
    $NameCourse = mysqli_real_escape_string($conn, $_POST['NameCourse']);
    $credit = mysqli_real_escape_string($conn, $_POST['credit']);
    $teachercode = $_SESSION['teachercode'];

  $UPDATE_course = "
    UPDATE course
    SET title  = '" .$NameCourse. "',
    credit  = '" .$credit. "'
    WHERE course_id    = " . $Courseid . "; ";

    if (mysqli_query($conn, $UPDATE_course)) {
        header("location: teaching_subject.php");
    }else{
        echo mysqli_error($conn);
        echo "<script>alert('failed')</script>";
        header("location: teaching_subject.php");
    }
}else{
    $course = $_GET["teaching_subject"];
    $sqlcourse = "SELECT * FROM course WHERE course_id = $course";
    
    $query= mysqli_query($conn, $sqlcourse);
    $result = mysqli_fetch_array($query);    
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Updata Course</title>
</head>

<body>
<center>
    <h3>Updata Course </h3>
    <form action="updateteaching_subject.php" method="POST">
        <p>ID Course</p>
        <input disabled type="text" name="Courseid" id="Courseid" placeholder="ID Course"
            value="<?php echo $result["course_id"]?>">
        <p>Name Course</p>
        <input type="text" name="NameCourse" id="NameCourse" placeholder="Name Course"
            value="<?php echo $result["title"]?>">
        <p>credit Course</p>
        <input type="text" name="credit" id="credit" placeholder="credit" pattern="[0-9]{1,}"
            value="<?php echo $result["credit"]?>" required> <br><br>
        <input type="submit" name="submit" class="btn btn-info" value="Done" />
    </form>

</body>

</html>