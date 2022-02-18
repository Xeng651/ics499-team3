<?php

class LeaveModel extends Database {

    protected function getAllLeaves() {
        $query = "SELECT * FROM `emp_leave`";
        $result = $this->connect()->query($query);
        return $result;
    }

    protected function setLeave($leave) {
        $query = "INSERT INTO `emp_leave`(reason, `start_date`, end_date, employee_id) VALUES(?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $reason = $leave->getReason();
        $startDate = $leave->getStartDate();
        $endDate = $leave->getEndDate();
        $employeeID = $leave->getEmployeeID();
        $stmt->execute([$reason, $startDate, $endDate, $employeeID]);
    }

    protected function delLeave($leaveID) {
        $query = "DELETE FROM `emp_leave` WHERE leave_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$leaveID]);
    }

    protected function editLeave($leave, $leaveID) {
        $query = "UPDATE `emp_leave` SET reason = ?, `start_date` = ?, end_date = ?, employee_id = ? WHERE leave_id = ?";
        $stmt = $this->connect()->prepare($query);
        $reason = $leave->getReason();
        $startDate = $leave->getStartDate();
        $endDate = $leave->getEndDate();
        $employeeID = $leave->getEmployeeID();;
        $stmt->execute([$reason, $startDate, $endDate, $employeeID, $leaveID]);
    }
}
