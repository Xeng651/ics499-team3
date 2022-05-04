<?php

class SalaryRepo extends Database {

    public function getAllSalaries() {
        $query = "SELECT * FROM `salary`";
        $result = $this->connect()->query($query);
        return $result;
    }

    public function getEmpSalary($employeeID) { 
        $query = "SELECT * FROM `salary` WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$employeeID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getSalary($salaryID) { 
        $query = "SELECT * FROM `salary` WHERE salary_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$salaryID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function setSalary($salary) {
        $query = "INSERT INTO `salary`(gross_pay, allowance, deduction, payment_method, net_pay, `date`, employee_id, dept_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $grossPay = $salary->getGrossPay();
        $allowance = $salary->getAllowance();
        $deduction = $salary->getDeduction();
        $paymentMethod = $salary->getPaymentMethod();
        $netPay = $salary->getNetPay();
        $date = $salary->getDate();
        $employeeID = $salary->getEmployeeID();
        $deptID = $salary->getDeptID();
        $stmt->execute([$grossPay, $allowance, $deduction, $paymentMethod, $netPay, $date, $employeeID, $deptID]);
    }

    public function delSalary($salaryID) {
        $query = "DELETE FROM `salary` WHERE salary_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$salaryID]);
    }

    public function editSalary($salary, $salaryID) {
        $query = "UPDATE `salary` SET gross_pay = ?, allowance = ?, deduction = ?, payment_method = ?, net_pay = ?, `date` = ?, employee_id = ?, dept_id = ? WHERE salary_id = ?";
        $stmt = $this->connect()->prepare($query);
        $grossPay = $salary->getGrossPay();
        $allowance = $salary->getAllowance();
        $deduction = $salary->getDeduction();
        $paymentMethod = $salary->getPaymentMethod();
        $netPay = $salary->getNetPay();
        $date = $salary->getDate();
        $employeeID = $salary->getEmployeeID();
        $deptID = $salary->getDeptID();
        $stmt->execute([$grossPay, $allowance, $deduction, $paymentMethod, $netPay, $date, $employeeID, $deptID, $salaryID]);
    }
}
