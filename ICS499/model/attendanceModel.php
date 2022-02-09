<?php

class AttendanceModel extends Database {

    protected function getAllAttendances() {
        $query = "SELECT * FROM `attendance`";
        $result = $this->connect()->query($query);
        return $result;
    }

    protected function getEmpAttendance($employeeID) { 
        $query = "SELECT * FROM `attendance` WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$employeeID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setAttendance($attendance) {
        $query = "INSERT INTO `attendance`(`status`, employee_id) VALUES(?, ?)";
        $stmt = $this->connect()->prepare($query);
        $status = $attendance->getStatus();
        $employeeID = $attendance->getEmployeeID();
        $stmt->execute([$status, $employeeID]);
    }

    protected function delAttendance($attendanceID) {
        $query = "DELETE FROM `attendance` WHERE attendance_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$attendanceID]);
    }

    protected function editAttendance($attendance, $attendanceID) {
        $query = "UPDATE `attendance` SET `status` = ?, employee_id = ? WHERE attendance_id = ?";
        $stmt = $this->connect()->prepare($query);
        $status = $attendance->getStatus();
        $employeeID = $attendance->getEmployeeID();
        $stmt->execute([$status, $employeeID, $attendanceID]);
    }
}
