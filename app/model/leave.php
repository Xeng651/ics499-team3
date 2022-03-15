<?php 

class Leave {

    private $reason;
    private $startDate;
    private $endDate;
    private $status;
    private $employeeID;

    function __construct() {

    }

    public function setReason($reason) {
        $this->reason = $reason;
    }

    public function getReason() {
        return $this->reason;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }

    public function getStartDate() {
        return $this->startDate;
    }

    public function setEndDate($endDate) {
        $this->endDate = $endDate;
    }

    public function getEndDate() {
        return $this->endDate;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setEmployeeID($employeeID) {
        $this->employeeID = $employeeID;
    }

    public function getEmployeeID() {
        return $this->employeeID;
    }

}

?>