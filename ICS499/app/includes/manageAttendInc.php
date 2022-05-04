<?php

$attendanceContr = new AttendanceContr();

if (isset($_POST["editAttend"])) {
    $attendanceID = $_POST["attendanceID"];
    $status = $_POST["status"];

    $attendanceContr->updateAttendance($status,  $attendanceID);
}

?>