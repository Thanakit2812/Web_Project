<?php
    include("../database/database.php"); 
    $query = "SELECT course.course_id ,course.title,course.credit,teacher.firstname,teacher.surname 
              FROM course INNER JOIN teacher ON course.teachercode = teacher.teachercode WHERE status ='on'";
    $result = mysqli_query($conn, $query);

    $query2 = "SELECT * FROM student WHERE studentcode = '$username'";
    $result2 = mysqli_query($conn, $query2);
    $objResult2 = mysqli_fetch_array($result2);
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
      <a class="navbar-brand" href="#">KMUTNB</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="schedule.php">Class schedule</a></li>
        <li><a href="subject.php">Subjects</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="drop.php">Drop class</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="# " style="color: white;"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
    <div style="width:100% ;background-color:Linen; text-align:center;">
      <p>Name
          <?php echo $objResult2["firstname"].' '. $objResult2["surname"].' รหัสนักศึกษา : '. $objResult2["studentcode"]?>
      </p>
      <h3>Subjects opened</h3>

      <div>
          <input type="text" id="inputsearch" class="form-control" style="width:30%; margin : auto; border-radius: 8px;">
          <button type="button" onclick="search()" class="btn btn-primary btn-lg">search</button>
      </div>
      <table id=table class="table table-bordered" style="width:80% ; margin: auto;">
          <thead>
              <tr>
                  <th width="10%" scope="col">#</th>
                  <th width="15%" scope="col">Subject ID</th>
                  <th width="25%" scope="col">Subject</th>
                  <th width="15%" scope="col">Credit</th>
                  <th width="35%" scope="col">Teacher</th>
              </tr>
          </thead>
          <tbody>
              <?php
                  $i = 1;
                  if (mysqli_num_rows($result) == 0) {
                      echo '<tr><td colspan="5">ไม่มีวิชาที่เปิดสอน</td></tr>';
                    }else{
                  while ($objResult = mysqli_fetch_array($result)) {
                  ?>
              <tr>
                  <td>
                      <div align="center"><?php echo $i; ?></div>
                  </td>
                  <td><?php echo $objResult["course_id"]; ?></td>
                  <td><?php echo $objResult["title"]; ?></td>
                  <td><?php echo $objResult["credit"]; ?></td>
                  <td><?php echo $objResult["firstname"].' '.$objResult["surname"]; ?></td>
              </tr>
              <?php
                $i++;
               }
               }?>
          </tbody>
      </table>
      </br>
  </div>
  </div>
</nav>
  
<div class="container">
  <h3>Collapsible Navbar</h3>
  <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).
  <p>Only when the button is clicked, the navigation bar will be displayed.</p>
</div>

</body>
</html>
