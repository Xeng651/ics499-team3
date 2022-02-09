<?php 

class Deduction {

    private $description;
    private $amount;
    private $salaryID;

    function __construct() {

    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setSalaryID($salaryID) {
        $this->salaryID = $salaryID;
    }

    public function getSalaryID() {
        return $this->salaryID;
    }

}

?>