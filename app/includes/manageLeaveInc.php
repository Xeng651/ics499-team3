<?php

$leaveContr = new LeaveContr();

if (isset($_POST["addLeave"])) {
    $leaveAdd = new leave();
    $leaveAdd->setReason($_POST["reason"]);
    $leaveAdd->setStartDate(date('Y-m-d', strtotime($_POST['startDate'])));
    $leaveAdd->setEndDate(date('Y-m-d', strtotime($_POST['endDate'])));
    $leaveAdd->setStatus("Pending");
    $leaveAdd->setEmployeeID($_POST["employeeID"]);

    $leaveContr->createleave($leaveAdd);
} elseif (isset($_POST["deleteLeave"])) {
    $leaveID = $_POST["leaveID"];
    $leaveContr->removeleave($leaveID);
}

?>