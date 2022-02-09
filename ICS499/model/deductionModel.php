<?php

class DeductionModel extends Database {

    protected function getAllDeductions() {
        $query = "SELECT * FROM `deduction`";
        $result = $this->connect()->query($query);
        return $result;
    }

    protected function setDeduction($deduction) {
        $query = "INSERT INTO `deduction`(`description`, amount, salary_id) VALUES(?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $description = $deduction->getDescription();
        $amount = $deduction->getAmount();
        $salaryID = $deduction->getSalaryID();
        $stmt->execute([$description, $amount, $salaryID]);
    }

    protected function delDeduction($deductionID) {
        $query = "DELETE FROM `deduction` WHERE deduction_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$deductionID]);
    }

    protected function editDeduction($deduction, $deductionID) {
        $query = "UPDATE `deduction` SET `description` = ?, amount = ?, salary_id = ? WHERE deduction_id = ?";
        $stmt = $this->connect()->prepare($query);
        $description = $deduction->getDescription();
        $amount = $deduction->getAmount();
        $salaryID = $deduction->getSalaryID();
        $stmt->execute([$description, $amount, $salaryID, $deductionID]);
    }
}
