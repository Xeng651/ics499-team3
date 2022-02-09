<?php

class AllowanceModel extends Database {

    protected function getAllAllowances() {
        $query = "SELECT * FROM `allowance`";
        $result = $this->connect()->query($query);
        return $result;
    }

    protected function setAllowance($allowance) {
        $query = "INSERT INTO `allowance`(`description`, amount, salary_id) VALUES(?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $description = $allowance->getDescription();
        $amount = $allowance->getAmount();
        $salaryID = $allowance->getSalaryID();
        $stmt->execute([$description, $amount, $salaryID]);
    }

    protected function delAllowance($allowanceID) {
        $query = "DELETE FROM `allowance` WHERE allowance_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$allowanceID]);
    }

    protected function editAllowance($allowance, $allowanceID) {
        $query = "UPDATE `allowance` SET `description` = ?, amount = ?, salary_id = ? WHERE allowance_id = ?";
        $stmt = $this->connect()->prepare($query);
        $description = $allowance->getDescription();
        $amount = $allowance->getAmount();
        $salaryID = $allowance->getSalaryID();
        $stmt->execute([$description, $amount, $salaryID, $allowanceID]);
    }
}
