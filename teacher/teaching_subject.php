<?php 
    session_start();
    include("../database/database.php");
    
    if (!isset($_COOKIE['cookiesteachercode'])&&!isset($_SESSION['teachercode'])) {
        header('location: login.php');
      }
      if (isset($_GET['logout'])) {
          session_destroy();
          unset($_SESSION['teachercode']);
          unset($_COOKIE["cookieteachercode"]);
          // setcookie("cookiestudentcode","", time() -3600);
          header('location: login.php');
      }
      if(isset($_SESSION['teachercode'])){
        $teachercode = $_SESSION['teachercode'];
          setcookie("cookiestudentcode","$teachercode", time() + 3600);
      }else{
        $teachercode= $_COOKIE["cookieteachercode"];
          $_SESSION['teachercode'] = $_COOKIE["cookieteachercode"];
          setcookie("cookieteachercode","$teachercode", time() + 3600);
      }
    $sqlcoures = "SELECT * FROM `course` WHERE `teachercode` ='$teachercode';";
    $objQuery = mysqli_query($conn, $sqlcoures) or die("Error Query [" . $sqlcoures . "]");
    

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
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <title>Pageweb teacher</title>
    <style>
    html,
    body {
        background-color: LightBlue;
    }

    table,
    th,
        {
        border: 1px solid black;
        border-collapse: collapse;
    }

    th,
        {
        padding: 5px;
        text-align: left;
    }

    h3 {
        text-align: center;
    }

    #myb {
        margin-left: 18%;
        margin-bottom: 3%;
    }

    @media (min-width: 600px) and (max-width: 900px) {}

    @media (min-width: 391px) and (max-width: 600px) {

        table,
        th,
            {
            font-size: 8px;
        }

        #myb {
            margin-left: 5%;
            margin-bottom: 3%;
        }

        @media (max-width: 389px) {

            table,
            th,
                {
                font-size: 3px;
            }

            #myb {
                margin-left: 1%;

            }

            img {
                width: 10px;
                height: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="tutorial">
            <h2>Welcome teacher</h2>
            <ul>
                <li><a href="webpage.php">Home</a></li>
                <li><a href="course.php">Teaching subjects</a><i class="fa fa-angle-down"></i> </li>
                <li><a href="../JSON/api.php">Student list</a> </li>
                <li><a href="course.php?logout='1'">Log-out</a></li>
            </ul>
            <div style="background-color:Linen;">
                <h3>Subjects offered</h3>
                <div class="bodytable">
                    <table class="table table-striped" id="myTable" style="weight:100%; magin:5%,7%,5%,7% ">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">course_ID</th>
                                <th scope="col">title</th>
                                <th scope="col">credit</th>x
                                <th scope="col">status</th>
                                <th scope="col"></th>
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
                                <td><?php echo $objResult["course_id"]; ?></td>
                                <td><a
                                        href="show.php?course=<?php echo $objResult["course_id"];?>"><?php echo $objResult["title"]; ?></a>
                                </td>
                                <td><?php echo $objResult["credit"]; ?></td>
                                <td><?php 
                                if($objResult["status"] == "on"){
                                echo '<a href="status.php?course='.$objResult["course_id"].'&status=off"> <button type="submit" class="btn btn-success">open</button></a>';
                                } else {
                                echo '<a href="status.php?course='.$objResult["course_id"].'&status=on"><button type="submit" class="btn btn-danger" id="myb">close</button></a>';
                                }
                                ?></td>
                                <td>
                                    <a href="delete.php?course=<?php echo $objResult["course_id"]; ?>"><img
                                            src="../icon/trash.svg" style="width:30px; height:30px;" alt="icon "> </a>
                                    /
                                    <a href="updata.php?course=<?php echo $objResult["course_id"]; ?>"><img
                                            src="../icon/arrow.svg" style="width:30px; height:30px;" alt="icon"> </a>
                                </td>

                            </tr>
                            <?php
                            $i++;
                            }?>
                        </tbody>
                    </table>
                </div>
                <div>
                    <a href="addcourse.php"><button type="submit" class="btn btn-primary">Add Course</button></a>
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