<?php

class EmployeeContr extends EmployeeModel {

    public function selectAllEmployees() {
        $employees = $this->getAllEmployees();
        return $employees;
    }

    public function selectEmployee($employeeID){
        $result = $this->getEmployee($employeeID);
        return $result;
    }

    public function createEmployee($employee) {
        $this->setEmployee($employee);
    }

    public function removeEmployee($employeeID) {
        $this->delEmployee($employeeID);
    }

    public function updateEmployee($employee, $employeeID) {
        $this->editEmpProfile($employee, $employeeID);
    }

}

?>