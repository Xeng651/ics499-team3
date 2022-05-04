<?php

class SearchRepo extends Database {

    public function searchForEmployee($search) {
        $query = "SELECT * FROM `employee` 
        INNER JOIN department 
        ON employee.dept_id = department.dept_id  
        WHERE employee.employee_id LIKE ? OR employee.first_name LIKE ? OR employee.last_name LIKE ? OR department.name LIKE ?
        ORDER BY employee.first_name ASC";
        
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$search, $search, $search, $search]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function searchForSalary($search) {
        $query = "SELECT * FROM `salary` 
        INNER JOIN employee 
        ON salary.employee_id = employee.employee_id  
        WHERE employee.first_name LIKE ? OR employee.last_name LIKE ? OR salary.date LIKE ?
        ORDER BY salary.date DESC";
        
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$search, $search, $search]);
        $results = $stmt->fetchAll();
        return $results;
    }

}
