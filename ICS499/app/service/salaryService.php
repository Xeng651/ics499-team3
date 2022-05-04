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

    public function getSalary($salaryID){
        $result = $this->salaryRepo->getSalary($salaryID);
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

    public function calculateNetPay($basicSalary, $allowance, $deduction) {
        $netpay = ($basicSalary + $allowance) - $deduction;
        return $netpay;
    }

    public function isEmpty($salary) {
        $flag = false;
        if(empty($salary->getAllowance()) || empty($salary->getDeduction()) || empty($salary->getPaymentMethod())){
           $flag = true;
        }

        return $flag;
    }

    public function convert_number($number) {
        if (($number < 0) || ($number > 999999999)) {
            throw new Exception("Number is out of range");
        }
        $giga = floor($number / 1000000);
        // Millions (giga)
        $number -= $giga * 1000000;
        $kilo = floor($number / 1000);
        // Thousands (kilo)
        $number -= $kilo * 1000;
        $hecto = floor($number / 100);
        // Hundreds (hecto)
        $number -= $hecto * 100;
        $deca = floor($number / 10);
        // Tens (deca)
        $n = $number % 10;
        // Ones
        $result = "";
        if ($giga) {
            $result .= $this->convert_number($giga) .  "Million";
        }
        if ($kilo) {
            $result .= (empty($result) ? "" : " ") .$this->convert_number($kilo) . " Thousand";
        }
        if ($hecto) {
            $result .= (empty($result) ? "" : " ") .$this->convert_number($hecto) . " Hundred";
        }
        $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen");
        $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety");
        if ($deca || $n) {
            if (!empty($result)) {
                $result .= " and ";
            }
            if ($deca < 2) {
                $result .= $ones[$deca * 10 + $n];
            } else {
                $result .= $tens[$deca];
                if ($n) {
                    $result .= "-" . $ones[$n];
                }
            }
        }
        if (empty($result)) {
            $result = "zero";
        }

        return $result;
    }

}

?>
