<?php

class DepartmentService {

    private $departmentRepo; 

    function __construct() {
        $this->departmentRepo = new DepartmentRepo();
    }

    public function getAllDepartments() {
        $departments = $this->departmentRepo->getAllDepartments();
        return $departments;
    }

    public function getDepartment($deptID) {
        $department = $this->departmentRepo->getDepartment($deptID);
        return $department;
    }

    public function getDepartmentByName($name) {
        $department = $this->departmentRepo->getDepartmentByName($name);
        return $department;
    }

    public function getTotalDeptNum() {
        $count = $this->departmentRepo->getTotalDeptNum();
        return $count;
    }

}

?>