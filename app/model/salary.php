<?php 

class Salary {

    private $grossPay;
    private $allowance;
    private $deduction;
    private $bankName;
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

    public function setBankName($bankName) {
        $this->bankName = $bankName;
    }

    public function getBankName() {
        return $this->bankName;
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

    public function calculateNetPay($grossPay, $allowance, $deduction){
        return ($grossPay + $allowance) - $deduction;
    }

    public function checkEmpty($grossPay, $allowance, $deduction, $employeeID, $bankName, $date, $deptID){
        //if any of the parameters are empty, direct the user back to the add page and give them an error.
        if(empty($grossPay) || empty($allowance) || empty($deduction) || empty($employeeID) || empty($bankName) || empty($date) || empty($deptID)){
            return true;
        }//procceed to the next thing.
        else{
            return false;
        }
    }

}

?>