<?php
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbName = "webcs";
    $conn = new mysqli($hostname, $username, $password, $dbName);
    mysqli_query($conn, "SET character_set_results=utf8");
    mysqli_set_charset($conn, "utf8");
    if ($conn->connect_error) {
        echo "<center>";
        echo "<h1 style='color:red;font-size:60;'>Alert !!</h1>";
        echo "<h1>";
        die("Connection failed : " . $conn->connect_error);
        echo "</h1>";

    }else{
        // echo "Success";
    }
?>