<?php

class SalaryService {

    private $salaryRepo; 

    function __construct() {
        $this->salaryRepo = new SalaryRepo();
    }

    public function getAllSalaries() {
        $salaries = $this->salaryRepo->getAllSalaries();
        return $salaries;
    }

    public function getEmpSalary($employeeID){
        $result = $this->salaryRepo->getEmpSalary($employeeID);
        return $result;
    }

    public function setSalary($salary) {
        $this->salaryRepo->setSalary($salary);
    }

    public function delSalary($salaryID) {
        $this->salaryRepo->delSalary($salaryID);
    }

    public function editSalary($salary, $salaryID) {
        $this->salaryRepo->editSalary($salary, $salaryID);
    }

}

?>