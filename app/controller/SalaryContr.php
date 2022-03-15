<?php

class SalaryContr extends SalaryService {

    public function selectAllSalaries() {
        $salaries = $this->getAllSalaries();
        return $salaries;
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