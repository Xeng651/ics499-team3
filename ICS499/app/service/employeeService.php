<?php

class EmployeeService {

    private $employeeRepo; 

    function __construct() {
        $this->employeeRepo = new EmployeeRepo();
    }

    public function getAllEmployees() {
        $employees = $this->employeeRepo->getAllEmployees();
        return $employees;
    }

    public function getEmployee($employeeID){
        $result = $this->employeeRepo->getEmployee($employeeID);
        return $result;
    }

    public function getEmployeeByEmail($emailAddress) {
        $result = $this->employeeRepo->getEmployeeByEmail($emailAddress);
        return $result;
    }

    public function getTotalEmployeeNum() {
        $count = $this->employeeRepo->getTotalEmployeeNum();
        return $count;
    }

    public function setEmployee($employee) {
        $this->employeeRepo->setEmployee($employee);
    }

    public function delEmployee($employeeID) {
        $this->employeeRepo->delEmployee($employeeID);
    }

    public function editEmp($employee, $employeeID) {
        $this->employeeRepo->editEmp($employee, $employeeID);
    }

    public function editEmpProfile($profile, $employeeID) {
        $this->employeeRepo->editEmpProfile($profile, $employeeID);
    }

    public function editEmpPhoto($employeeID, $photo) {
        $this->employeeRepo->editEmpPhoto($employeeID, $photo);
    }

    public function editEmpPassword($employeeID, $inputedPass) {
        $this->employeeRepo->editEmpPassword($employeeID, $inputedPass);
    }

    public function editEmpNumLeave($employeeID, $num) {
        $this->employeeRepo->editEmpNumLeave($employeeID, $num);
    }

    public function isEmpty($employee) {
        $flag = false;
        if(empty($employee->getFirstName()) || empty($employee->getLastName()) || empty($employee->getDeptID()) || empty($employee->getJobID()) || empty($employee->getEmailAddress()) || empty($employee->getEmpPassword()) || empty($employee->getGender()) || empty($employee->getBirthDate()) || empty($employee->getAddress()) || empty($employee->getPhone()) || empty($employee->getDateJoined())){
           $flag = true;
        }

        return $flag;
    }

}

?>
