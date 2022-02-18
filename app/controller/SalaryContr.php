<?php

class SalaryContr extends SalaryModel {

    public function selectAllSalaries() {
        $employees = $this->getAllSalaries();
        return $employees;
    }

    public function selectEmpSalary($employeeID){
        $result = $this->getEmpSalary($employeeID);
        return $result;
    }

    public function createSalary($salary) {
        $this->setSalary($salary);
    }

    public function removeSalary($salaryID) {
        $this->delSalary($salaryID);
    }

    public function updateSalary($salary, $salaryID) {
        $this->editSalary($salary, $salaryID);
    }

}

?>