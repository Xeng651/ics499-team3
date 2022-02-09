<?php

class AllowanceContr extends AllowanceModel {

    public function selectAllAllowances() {
        $allowances = $this->getAllAllowances();
        return $allowances;
    }

    public function createAllowance($allowance) {
        $this->setAllowance($allowance);
    }

    public function removeAllowance($allowanceID) {
        $this->delAllowance($allowanceID);
    }

    public function updateAllowance($allowance, $allowanceID) {
        $this->editAllowance($allowance, $allowanceID);
    }

}

?>