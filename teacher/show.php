<?php
session_start();
include("../database/database.php");

if (!isset($_COOKIE['cookiesteachercode']) && !isset($_SESSION['teachercode'])) {
    header('location: login_teacher.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['teachercode']);
    unset($_COOKIE["cookieteachercode"]);
    // setcookie("cookiestudentcode","", time() -3600);
    header('location: login_teacher.php');
}
if (isset($_SESSION['teachercode'])) {
    $teachercode = $_SESSION['teachercode'];
    setcookie("cookiestudentcode", "$teachercode", time() + 3600);
} else {
    $teachercode = $_COOKIE["cookieteachercode"];
    $_SESSION['teachercode'] = $_COOKIE["cookieteachercode"];
    setcookie("cookieteachercode", "$teachercode", time() + 3600);
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$course = $_GET["teaching_subject"];
$perpage = 5;
$sql2 = "SELECT * FROM register INNER JOIN student ON register.studentcode = student.studentcode WHERE register.course_id =$course ";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);

$start = ($page - 1) * $perpage;

$teachercode = $_SESSION["teachercode"];
$sqlcoures = "SELECT * FROM register INNER JOIN student ON register.studentcode = student.studentcode WHERE register.course_id =$course  LIMIT $start,$perpage";
$objQuery = mysqli_query($conn, $sqlcoures) or die("Error Query [" . $sqlcoures . "]");


$sql  = "SELECT * FROM course WHERE course_id = '$course'";
$query2 =  mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
$result2 = mysqli_fetch_assoc($query2);
$name = $result2["title"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu|Lora">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse" style="background-color: #FF7800;">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home_teacher.php">KMUTNB</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home_teacher.php">Home</a></li>
                    <li><a href="student_list.php">Student list</a></li>
                    <li><a href="teaching_subject.php">Teaching subject</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home_teacher.php?logout='1'" style="color: white;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div>
                <h3>Subjects <?php echo $name ?></h3>
                <table class="table table-striped" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10%" scope="col">#</th>
                            <th width="40%" scope="col">Student Code</th>
                            <th width="50%" scope="col">Name</th>
                            <th width="50%" scope="col">address</th>
                            <th width="50%" scope="col">subdistrict</th>
                            <th width="50%" scope="col">district</th>
                            <th width="50%" scope="col">postal</th>
                            <th width="50%" scope="col">province</th>
                            <th width="50%" scope="col">tel</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            while ($objResult = mysqli_fetch_array($objQuery)) {
                            ?>
                        <tr>
                            <td>
                                <div align="center"><?php echo $i; ?></div>
                            </td>
                            <td><?php echo $objResult["studentcode"]; ?></td>
                            <td><?php echo $objResult["firstname"].' '.$objResult["surname"]; ?></td>
                            <td><?php echo $objResult["address"]; ?></td>
                            <td><?php echo $objResult["subdistrict"]; ?></td>
                            <td><?php echo $objResult["district"]; ?></td>
                            <td><?php echo $objResult["postal"]; ?></td>
                            <td><?php echo $objResult["province"]; ?></td>
                            <td><?php echo $objResult["tel"]; ?></td>
                        </tr>
                        <?php
                          $i++;
                         }?>
                    </tbody>
                </table>
                <div aria-label="Page navigation ">
                    <ul class="pagination">
                        <?php for($i=1;$i<=$total_page;$i++){ ?>
                        <li class="page-item"><a class="page-link"
                                href="test_api.php?page=<?php echo $i; ?>&teaching_subject=<?php echo $course; ?>"><?php echo $i?></a></li>
                        <?php } ?>
                    </ul>
                </div>

    </div>
    

</body>

</html>