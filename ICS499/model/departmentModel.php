<?php

class DepartmentModel extends Database {

    protected function getAllDepartments() {
        $query = "SELECT * FROM `department`";
        $result = $this->connect()->query($query);
        return $result;
    }
    
}
