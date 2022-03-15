<?php

class LeaveRepo extends Database {

    public function getAllLeaves() {
        $query = "SELECT * FROM `emp_leave`";
        $result = $this->connect()->query($query);
        return $result;
    }

    public function getTotalLeaveByStatus($status) {
        $query = "SELECT COUNT(*) FROM `emp_leave` WHERE `status` = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$status]);
        $count = $stmt->fetchColumn();
        return $count;
    }

    public function setLeave($leave) {
        $query = "INSERT INTO `emp_leave`(reason, `start_date`, end_date, `status`, employee_id) VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $reason = $leave->getReason();
        $startDate = $leave->getStartDate();
        $endDate = $leave->getEndDate();
        $status = $leave->getStatus();
        $employeeID = $leave->getEmployeeID();
        $stmt->execute([$reason, $startDate, $endDate, $status, $employeeID]);
    }

    public function delLeave($leaveID) {
        $query = "DELETE FROM `emp_leave` WHERE leave_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$leaveID]);
    }

    public function editLeave($leave, $leaveID) {
        $query = "UPDATE `emp_leave` SET reason = ?, `start_date` = ?, end_date = ?, `status` = ?, employee_id = ? WHERE leave_id = ?";
        $stmt = $this->connect()->prepare($query);
        $reason = $leave->getReason();
        $startDate = $leave->getStartDate();
        $endDate = $leave->getEndDate();
        $status = $leave->getStatus();
        $employeeID = $leave->getEmployeeID();;
        $stmt->execute([$reason, $startDate, $endDate, $status, $employeeID, $leaveID]);
    }
}
