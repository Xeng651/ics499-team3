<?php

class LeaveService {

    private $leaveRepo; 

    function __construct() {
        $this->leaveRepo = new LeaveRepo();
    }

    public function getAllLeaves() {
        $leaves = $this->leaveRepo->getAllLeaves();
        return $leaves;
    }

    public function getLeave($leaveID) {
        $leave = $this->leaveRepo->getLeave($leaveID);
        return $leave;
    }

    public function getLeaveByEmpID($employeeID) {
        $leave = $this->leaveRepo->getLeaveByEmpID($employeeID);
        return $leave;
    }

    public function getTotalLeaveByColor($color) {
        $count = 0;
        
        if ($color == "#e4edff" || $color == "#90EE90") {
            $count = $this->leaveRepo->getTotalLeaveByColor($color);
        }

        return $count;
    }

    public function getTotalLeaveOfEmployee($color, $employeeID) {
        $count = 0;
        
        if ($color == "#e4edff" || $color == "#90EE90") {
            $count = $this->leaveRepo->getTotalLeaveOfEmployee($color, $employeeID);
        }

        return $count;
    }

    public function editLeaveState($leaveID, $state) {
        $this->leaveRepo->editLeaveState($leaveID, $state);
    }

    public function delLeave($leaveID) {
        $this->leaveRepo->delLeave($leaveID);
    }

}

?>