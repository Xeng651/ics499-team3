<?php

class AttendanceRepo extends Database {

    public function getAllAttendances() {
        $query = "SELECT * FROM `attendance`";
        $result = $this->connect()->query($query);
        return $result;
    }

    public function getEmpAttendance($employeeID) { 
        $query = "SELECT * FROM `attendance` WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$employeeID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getTotalAttendanceByStatus($status) {
        $query = "SELECT COUNT(*) FROM `attendance` WHERE `status` = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$status]);
        $count = $stmt->fetchColumn();
        return $count;
    }

    public function setAttendance($attendance) {
        $query = "INSERT INTO `attendance`(`status`, employee_id) VALUES(?, ?)";
        $stmt = $this->connect()->prepare($query);
        $status = $attendance->getStatus();
        $employeeID = $attendance->getEmployeeID();
        $stmt->execute([$status, $employeeID]);
    }

    public function delAttendance($attendanceID) {
        $query = "DELETE FROM `attendance` WHERE attendance_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$attendanceID]);
    }

    public function editAttendance($status, $attendanceID) {
        $query = "UPDATE `attendance` SET `status` = ? WHERE attendance_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$status, $attendanceID]);
    }
}
