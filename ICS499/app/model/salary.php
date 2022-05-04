<?php 

class Salary {

    private $grossPay;
    private $allowance;
    private $deduction;
    private $paymentMethod;
    private $netPay;
    private $date;
    private $employeeID;
    private $deptID;

    function __construct() {

    }

    public function setGrossPay($grossPay) {
        $this->grossPay = $grossPay;
    }

    public function getGrossPay() {
        return $this->grossPay;
    }

    public function setAllowance($allowance) {
        $this->allowance = $allowance;
    }

    public function getAllowance() {
        return $this->allowance;
    }

    public function setDeduction($deduction) {
        $this->deduction = $deduction;
    }

    public function getDeduction() {
        return $this->deduction;
    }

    public function setPaymentMethod($paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }

    public function getPaymentMethod() {
        return $this->paymentMethod;
    }

    public function setNetPay($netPay) {
        $this->netPay = $netPay;
    }

    public function getNetPay() {
        return $this->netPay;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getDate() {
        return $this->date;
    }

    public function setEmployeeID($employeeID) {
        $this->employeeID = $employeeID;
    }

    public function getEmployeeID() {
        return $this->employeeID;
    }

    public function setDeptID($deptID) {
        $this->deptID = $deptID;
    }

    public function getDeptID() {
        return $this->deptID;
    }

}

?>