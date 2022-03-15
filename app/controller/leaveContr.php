<?php

class LeaveContr extends LeaveService {

    public function selectAllLeaves() {
        $leaves = $this->getAllLeaves();
        return $leaves;
    }

    public function showTotalLeaveByStatus($status) {
        return $this->getTotalLeaveByStatus($status);
    }

    public function createLeave($leave) {
        if ($this->isEmpty($leave)) {
            header("Location: ../view/add-leave.php?addLeave=empty");
        } else {
            $this->setLeave($leave);
            header("Location: ../view/manage-leave.php");
        }
    }

    public function removeLeave($leaveID) {
        $this->delLeave($leaveID);
    }

    public function updateLeave($leave, $leaveID) {
        $this->editLeave($leave, $leaveID);
    }

}

?>
