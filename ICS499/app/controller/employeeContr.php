<?php

class EmployeeContr extends EmployeeService {

    public function selectAllEmployees() {
        $employees = $this->getAllEmployees();
        return $employees;
    }

    public function selectEmployee($employeeID){
        $result = $this->getEmployee($employeeID);
        return $result;
    }

    public function selectEmployeeByEmail($emailAddress) {
        $result = $this->getEmployeeByEmail($emailAddress);
        return $result;
    }

    public function showTotalEmployeeNum() {
        return $this->getTotalEmployeeNum();
    }

    public function createEmployee($employee) {
        if ($this->isEmpty($employee)) {
            header("Location: ../view/add-emp.php?addEmp=empty");
        } else {
            $this->setEmployee($employee);
            header("Location: ../view/manage-emp.php");
        }
    }

    public function removeEmployee($employeeID) {
        $this->delEmployee($employeeID);
        header("Location: ../view/manage-emp.php");
    }

    public function updateEmp($employee, $employeeID) {
        $this->editEmp($employee, $employeeID);
        header("Location: ../view/manage-emp.php");
    }

    public function updateEmpProfile($profile, $employeeID) {
        $this->editEmpProfile($profile, $employeeID);
    }

    public function updateEmpPhoto($employeeID, $photo) {
        $this->editEmpPhoto($employeeID, $photo);
    }

    public function updateEmpPassword($employeeID, $inputedPass) {
        $this->editEmpPassword($employeeID, $inputedPass);
    }

    public function updateEmpNumLeave($employeeID, $num) {
        $this->editEmpNumLeave($employeeID, $num);
    }

}
