<?php 

class Attendance {

    private $date;
    private $status;
    private $employeeID;

    function __construct() {

    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getDate() {
        return $this->date;
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