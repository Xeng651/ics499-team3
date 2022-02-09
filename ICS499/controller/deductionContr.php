<?php

class DeductionContr extends DeductionModel {

    public function selectAllDeductions() {
        $deductions = $this->getAllDeductions();
        return $deductions;
    }

    public function createDeduction($deduction) {
        $this->setDeduction($deduction);
    }

    public function removeDeduction($deductionID) {
        $this->delDeduction($deductionID);
    }

    public function updateAllowance($deduction, $deductionID) {
        $this->editDeduction($deduction, $deductionID);
    }

}

?>