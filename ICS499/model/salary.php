<?php 

class Salary {

    private $grossPay;
    private $bankName;
    private $netPay;
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