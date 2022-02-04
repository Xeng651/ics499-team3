<?php 

class Attendance {

    private $title;
    private $rate;
    private $deptID;

    function __construct() {

    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getitle() {
        return $this->title;
    }

    public function setRate($rate) {
        $this->rate = $rate;
    }

    public function getRate() {
        return $this->rate;
    }

    public function setDeptID($deptID) {
        $this->deptID = $deptID;
    }

    public function getDeptID() {
        return $this->deptID;
    }

}

?>