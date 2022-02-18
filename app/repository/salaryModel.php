<?php

class SalaryModel extends Database {

    protected function getAllSalaries() {
        $query = "SELECT * FROM `salary`";
        $result = $this->connect()->query($query);
        return $result;
    }

    protected function getEmpSalary($employeeID) { 
        $query = "SELECT * FROM `salary` WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$employeeID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setSalary($salary) {
        $query = "INSERT INTO `salary`(gross_pay, allowance, deduction, bank_name, net_pay, employee_id, dept_id) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $grossPay = $salary->getGrossPay();
        $allowance = $salary->getAllowance();
        $deduction = $salary->getDeduction();
        $bankName = $salary->getBankName();
        $netPay = $salary->getNetPay();
        $employeeID = $salary->getEmployeeID();
        $deptID = $salary->getDeptID();
        $stmt->execute([$grossPay, $allowance, $deduction, $bankName, $netPay, $employeeID, $deptID]);
    }

    protected function delSalary($salaryID) {
        $query = "DELETE FROM `salary` WHERE salary_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$salaryID]);
    }

    protected function editSalary($salary, $salaryID) {
        $query = "UPDATE `salary` SET gross_pay = ?, allowance = ?, deduction = ?, bank_name = ?, net_pay = ?, employee_id = ?, dept_id = ? WHERE salary_id = ?";
        $stmt = $this->connect()->prepare($query);
        $grossPay = $salary->getGrossPay();
        $allowance = $salary->getAllowance();
        $deduction = $salary->getDeduction();
        $bankName = $salary->getBankName();
        $netPay = $salary->getNetPay();
        $employeeID = $salary->getEmployeeID();
        $deptID = $salary->getDeptID();
        $stmt->execute([$grossPay, $allowance, $deduction, $bankName, $netPay, $employeeID, $deptID, $salaryID]);
    }
}
