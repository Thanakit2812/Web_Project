<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include "../config/DbConnect.php";
include "../config/HCExec.php";
$teachercode = $_SESSION["teachercode"];
$db = new DatabaseConnection();
$strConn = $db->getConnection();
$strExe = new HCExec($strConn);
$sql = "SELECT * FROM student JOIN register ON student.studentcode = register.studentcode JOIN course ON course.course_id = register.course_id WHERE course.teachercode=$teachercode GROUP BY student.studentcode";
$stmt = $strExe->read($sql);
$rowCount = $stmt->rowCount();

if ($rowCount > 0) {
    $data_arr['student'] = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        array_push($data_arr["student"], $row);
    }
    echo json_encode($data_arr);
} else {
    echo json_encode(array("message" => "No data found", "row" => $rowCount));
}
?>