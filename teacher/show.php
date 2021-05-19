<?php
session_start();
include("../database/database.php");
if (!isset($_SESSION['teachercode'])) {
  header('location: login_teacher.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['teachercode']);
    header('location: login_teacher.php');
}

if(isset($_GET['page'])) {
    $page = $_GET['page'];
}else{
    $page = 1 ;
}
$course = $_GET["teaching_subject"];
$perpage = 5;
$sql2 = "SELECT student.studentcode AS studentcode ,student.Name AS Name,student.Surname AS Lname FROM register INNER JOIN student ON register.studentcode = student.studentcode WHERE register.course_id =$course ";
$query2 = mysqli_query($conn, $sql2);
$total_record = mysqli_num_rows($query2);
$total_page = ceil($total_record / $perpage);

$start = ($page - 1) * $perpage;

$teachercode = $_SESSION["teachercode"];
$sqlcoures = "SELECT student.studentcode AS studentcode ,student.Name AS Name,student.Surname AS Lname FROM register INNER JOIN student ON register.studentcode = student.studentcode WHERE register.course_id =$course  LIMIT $start,$perpage";
$objQuery = mysqli_query($conn, $sqlcoures) or die("Error Query [" . $sqlcoures . "]");


$sql  = "SELECT * FROM course WHERE course_id = '$course'";
$query2=  mysqli_query($conn, $sql) or die("Error Query [".$sql."]");
$result2 = mysqli_fetch_assoc($query2);
$name = $result2["title"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset=" utf-8 ">
    <meta name="viewport" content="width=device-width, initial-scale=1 ">
    <link rel="stylesheet" type="text/css" href="style/webpage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">


    <title>teacher</title>
    <style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 5px;
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="tutorial">
            <h2>Welcome teacher</h2>
            <ul>
                <li><a href="webpage.php">Home</a></li>
                <li><a href="teaching_subject.php">Teaching subjects</a><i class="fa fa-angle-down"></i> </li>
                <li><a href="../JSON/api.php">Student list</a> </li>
                <li><a href="teaching_subject.php?logout='1'">Log-out</a></li>
            </ul>
            <div>
                <h3>Subjects <?php echo $name ?></h3>
                <table class="table table-striped" id="myTable">
                    <thead class="thead-dark">
                        <tr>
                            <th width="10%" scope="col">#</th>
                            <th width="40%" scope="col">Student Code</th>
                            <th width="50%" scope="col">Name</th>
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
                            <td><?php echo $objResult["Name"].' '.$objResult["Lname"]; ?></td>
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
                                href="show.php?page=<?php echo $i; ?>&teaching_subject=<?php echo $course; ?>"><?php echo $i?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>