<?php

class DepartmentContr extends DepartmentService {

    public function selectAllDepartments() {
        $departments = $this->getAllDepartments();
        return $departments;
    }

    public function selectDepartment($deptID) {
        $department = $this->getDepartment($deptID);
        return $department;
    }

    public function selectDepartmentByName($name) {
        $department = $this->getDepartmentByName($name);
        return $department;
    }

    public function showTotalDeptNum() {
        return $this->getTotalDeptNum();
    }

}

?>