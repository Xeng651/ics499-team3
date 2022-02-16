<?php

class EmployeeModel extends Database {

    protected function getAllEmployees() {
        $query = "SELECT * FROM `employee`";
        $result = $this->connect()->query($query);
        return $result;
    }

    protected function getEmployee($employeeID) { 
        $query = "SELECT * FROM `employee` WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$employeeID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getEmployeeByEmail($emailAddress) {
        $query = "SELECT * FROM `employee` WHERE email_address = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$emailAddress]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setEmployee($employee) {
        $query = "INSERT INTO `employee`(first_name, last_name, birth_date, gender, email_address, emp_password, `address`, phone, `role`, photo, dept_id, job_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $firstName = $employee->getFirstName();
        $lastName = $employee->getLastName();
        $birthDate = $employee->getBirthDate();
        $gender = $employee->getGender();
        $emailAddress = $employee->getEmailAddress();
        $empPassword = password_hash($employee->getEmpPassword(), PASSWORD_DEFAULT);
        $address = $employee->getAddress();
        $phone = $employee->getPhone();
        $role = $employee->getRole();
        $photo = $employee->getPhoto();
        $dept_id = $employee->getDeptID();
        $job_id = $employee->getJobID();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $emailAddress, $empPassword, $address, $phone, $role, $photo, $dept_id, $job_id]);
    }

    protected function delEmployee($employeeID) {
        $query = "DELETE FROM `employee` WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$employeeID]);
    }

    protected function editEmpProfile($employee, $employeeID) {
        $query = "UPDATE `employee` SET first_name = ?, last_name = ?, birth_date = ?, gender = ?, email_address = ?, emp_password = ?, `address` = ?, phone = ?, `role` = ?, photo = ?, dept_id = ?, job_id = ? WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $firstName = $employee->getFirstName();
        $lastName = $employee->getLastName();
        $birthDate = $employee->getBirthDate();
        $gender = $employee->getGender();
        $emailAddress = $employee->getEmailAddress();
        $empPassword = $employee->getEmpPassword();
        $address = $employee->getAddress();
        $phone = $employee->getPhone();
        $role = $employee->getRole();
        $photo = $employee->getPhoto();
        $dept_id = $employee->getDeptID();
        $job_id = $employee->getJobID();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $emailAddress, $empPassword, $address, $phone, $role, $photo, $dept_id, $job_id, $employeeID]);
    }

    protected function editEmpPassword($employeeID, $inputedPass) {
        $query = "UPDATE `employee` SET emp_password = ? WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $empPassword = password_hash($inputedPass, PASSWORD_DEFAULT);
        $stmt->execute([$empPassword, $employeeID]);
    }

}
