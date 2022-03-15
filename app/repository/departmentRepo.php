<?php

class DepartmentRepo extends Database {

    public function getAllDepartments() {
        $query = "SELECT * FROM `department`";
        $result = $this->connect()->query($query);
        return $result;
    }

    public function getDepartment($deptID) {
        $query = "SELECT * FROM `department` WHERE dept_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$deptID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getDepartmentByName($name) {
        $query = "SELECT * FROM `department` WHERE `name` = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$name]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getTotalDeptNum() {
        $query = "SELECT COUNT(*) FROM `department`";
        $stmt = $this->connect()->query($query);
        $count = $stmt->fetchColumn();
        return $count;
    }
    
}
