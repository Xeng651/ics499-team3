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

    public function getTotalLeaveByStatus($status) {
        $count = 0;
        
        if ($status == "Pending" || $status == "Approved") {
            $count = $this->leaveRepo->getTotalLeaveByStatus($status);
        }

        return $count;
    }

    public function setLeave($leave) {
        $this->leaveRepo->setLeave($leave);
    }

    public function delLeave($leaveID) {
        $this->leaveRepo->delLeave($leaveID);
    }

    public function editLeave($leave, $leaveID) {
        $this->leaveRepo->editLeave($leave, $leaveID);
    }

    public function isEmpty($leave) {
        $flag = false;
        if(empty($leave->getReason()) || empty($leave->getStartDate()) || empty($leave->getEndDate()) || empty($leave->getStatus()) || empty($leave->getEmployeeID())) {
           $flag = true;
        }

        return $flag;
    }

}

?>