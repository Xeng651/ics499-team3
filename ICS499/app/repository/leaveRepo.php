<?php

class LeaveRepo extends Database {

    public function getAllLeaves() {
        $query = "SELECT * FROM `emp_leave` ORDER BY `leave_start` DESC";
        $result = $this->connect()->query($query);
        return $result;
    }

    public function getLeave($leaveID) {
        $query = "SELECT * FROM `emp_leave` WHERE leave_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$leaveID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getLeaveByEmpID($employeeID) {
        $query = "SELECT * FROM `emp_leave` WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$employeeID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getTotalLeaveByColor($color) {
        $query = "SELECT COUNT(*) FROM `emp_leave` WHERE `leave_color` = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$color]);
        $count = $stmt->fetchColumn();
        return $count;
    }

    public function getTotalLeaveOfEmployee($color, $employeeID) {
        $query = "SELECT COUNT(*) FROM `emp_leave` WHERE `leave_color` = ? AND employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$color, $employeeID]);
        $count = $stmt->fetchColumn();
        return $count;
    }

    public function editLeaveState($leaveID, $state) {
        $query = "UPDATE `emp_leave` SET `state` = ? WHERE leave_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$state, $leaveID]);
    }

    public function delLeave($leaveID) {
        $query = "DELETE FROM `emp_leave` WHERE leave_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$leaveID]);
    }
}
