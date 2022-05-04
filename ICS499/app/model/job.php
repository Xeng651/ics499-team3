<?php 

class Job {

    private $title;
    private $basicSalary;
    private $deptID;

    function __construct() {

    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getitle() {
        return $this->title;
    }

    public function setBasicSalary($basicSalary) {
        $this->basicSalary = $basicSalary;
    }

    public function getBasicSalary() {
        return $this->basicSalary;
    }

    public function setDeptID($deptID) {
        $this->deptID = $deptID;
    }

    public function getDeptID() {
        return $this->deptID;
    }

}

?>