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

    public function selectEmployeeByEmail($emailAddress) {
        $result = $this->getEmployeeByEmail($emailAddress);
        return $result;
    }

    public function createEmployee($employee) {
        $this->setEmployee($employee);
    }

    public function removeEmployee($employeeID) {
        $this->delEmployee($employeeID);
    }

    public function updateEmpProfile($employee, $employeeID) {
        $this->editEmpProfile($employee, $employeeID);
    }

    public function updateEmpPassword($employeeID, $inputedPass) {
        $this->editEmpPassword($employeeID, $inputedPass);
    }

}

?>