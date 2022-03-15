<?php

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
        
        if ($status == "Active" || $status == "Late" || $status == "Absent") {
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

    public function editAttendance($attendance, $attendanceID) {
        $this->attendanceRepo->editAttendance($attendance, $attendanceID);
    }

}

?>