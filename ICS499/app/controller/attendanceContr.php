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

    public function createAttendance($attendance, $date, $employeeID) {
        if ($this->dateExist($date, $employeeID)) {
            header("Location: ../view/dashboard.php?checkin=exist");
        } else {
            $this->setAttendance($attendance);
            header("Location: ../view/dashboard.php?checkin=success");
        }
    }

    public function removeAttendance($attendanceID) {
        $this->delAttendance($attendanceID);
    }

    public function updateAttendance($status, $attendanceID) {
        $this->editAttendance($status, $attendanceID);
    }

    public function checkStatus($time) {
        return $this->getStatus($time);
    }

}

?>
