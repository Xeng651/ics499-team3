<?php

class LeaveContr extends LeaveModel {

    public function selectAllLeaves() {
        $leaves = $this->getAllLeaves();
        return $leaves;
    }

    public function createLeave($leave) {
        $this->setLeave($leave);
    }

    public function removeLeave($leaveID) {
        $this->delLeave($leaveID);
    }

    public function updateLeave($leave, $leaveID) {
        $this->editLeave($leave, $leaveID);
    }

}

?>