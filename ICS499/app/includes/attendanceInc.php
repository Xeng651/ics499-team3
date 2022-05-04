<?php

$attendanceContr = new AttendanceContr();

if (isset($_POST["checkin"])) {
    $attendance = new Attendance();
    $attendance->setEmployeeID($_POST['empID']);

    $status = $attendanceContr->checkStatus($_POST['datetime']);
    $attendance->setStatus($status);

    $attendanceContr->createAttendance($attendance, $_POST['date'], $_POST['empID']);
}

?>