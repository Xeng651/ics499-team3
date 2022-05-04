<?php

date_default_timezone_set("US/Central");

class AttendanceService {

    private $attendanceRepo; 

    function __construct() {
        $this->attendanceRepo = new AttendanceRepo();
    }

    public function getAllAttendances() {
        $attendances = $this->attendanceRepo->getAllAttendances();
        return $attendances;
    }

    public function getEmpAttendance($employeeID){
        $result = $this->attendanceRepo->getEmpAttendance($employeeID);
        return $result;
    }

    public function getTotalAttendanceByStatus($status) {
        $count = 0;
        
        if ($status == "On Time" || $status == "Late") {
            $count = $this->attendanceRepo->getTotalAttendanceByStatus($status);
        }

        return $count;
    }

    public function setAttendance($attendance) {
        $this->attendanceRepo->setAttendance($attendance);
    }

    public function delAttendance($attendanceID) {
        $this->attendanceRepo->delAttendance($attendanceID);
    }

    public function editAttendance($status, $attendanceID) {
        $this->attendanceRepo->editAttendance($status, $attendanceID);
    }

    public function getStatus($time) {
        $status = "";
        if ($time > strtotime("08:00 AM")) {
            $status = "Late";
        } else {
            $status = "On Time";
        }

        return $status;
    }

    public function dateExist($date, $employeeID) {
        $flag = false;
        $empAttends = $this->attendanceRepo->getEmpAttendance($employeeID);
        foreach ($empAttends as $empAttend) {
            $datetime = $empAttend['date'];
            $empdate = date("Y-m-d", strtotime($datetime));
            if ($date == $empdate) {
                $flag = true;
            }
        }

        return $flag;
    }

}

?>
