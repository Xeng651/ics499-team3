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

    public function selectSalary($salaryID){
        $result = $this->getSalary($salaryID);
        return $result;
    }

    public function createSalary($salary) {
        $empID = $salary->getEmployeeID();
        $date = $salary->getDate();
        if ($this->isEmpty($salary)) {
            header("Location: ../view/add-payslip.php?addPaySlip=empty&empID=$empID&date=$date");
        } else {
            $this->setSalary($salary);
            header("Location: ../view/manage-payslip.php");
        }
    }

    public function removeSalary($salaryID) {
        $this->delSalary($salaryID);
    }

    public function updateSalary($salary, $salaryID) {
        $this->editSalary($salary, $salaryID);
    }

    public function calcNetPay($basicSalary, $allowance, $deduction) {
        if (empty($allowance) || empty($deduction)) {
            header("Location: ../view/add-payslip.php?addPaySlip=empty");
        } else {
            return $this->calculateNetPay($basicSalary, $allowance, $deduction);
        }
    }

    public function convertNumber($number) {
        return $this->convert_number($number);
    }

}

?>