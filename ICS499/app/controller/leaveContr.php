<?php

class LeaveContr extends LeaveService {

    public function selectAllLeaves() {
        $leaves = $this->getAllLeaves();
        return $leaves;
    }

    public function selectLeave($leaveID) {
        $leave = $this->getLeave($leaveID);
        return $leave;
    }

    public function selectLeaveByEmpID($employeeID) {
        $leave = $this->getLeaveByEmpID($employeeID);
        return $leave;
    }

    public function showTotalLeaveByColor($color) {
        return $this->getTotalLeaveByColor($color);
    }

    public function showTotalLeaveOfEmployee($color, $employeeID) {
        return $this->getTotalLeaveOfEmployee($color, $employeeID);
    }

    public function updateLeaveState($leaveID, $state) {
        $this->editLeaveState($leaveID, $state);
    }

    public function removeLeave($leaveID) {
        $this->delLeave($leaveID);
    }

}

?>
