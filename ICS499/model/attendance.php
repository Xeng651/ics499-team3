<?php 

class Attendance {

    private $status;
    private $employeeID;

    function __construct() {

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