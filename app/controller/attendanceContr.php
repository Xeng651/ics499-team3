<?php

class AttendanceContr extends AttendanceService{

    public function selectAllAttendances() {
        $attendances = $this->getAllAttendances();
        return $attendances;
    }

    public function selectEmpAttendance($employeeID){
        $result = $this->getEmpAttendance($employeeID);
        return $result;
    }

    public function showTotalAttendanceByStatus($status) {
        return $this->getTotalAttendanceByStatus($status);
    }

    public function createAttendance($attendance) {
        $this->setAttendance($attendance);
    }

    public function removeAttendance($attendanceID) {
        $this->delAttendance($attendanceID);
    }

    public function updateAttendance($attendance, $attendanceID) {
        $this->editAttendance($attendance, $attendanceID);
    }

}

?>