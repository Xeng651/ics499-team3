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

    protected function setEmployee($employee) {
        $query = "INSERT INTO `employee`(first_name, last_name, birth_date, gender, email_address, emp_password, `address`, phone, photo, dept_id, job_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $firstName = $employee->getFirstName();
        $lastName = $employee->getLastName();
        $birthDate = $employee->getBirthDate();
        $gender = $employee->getGender();
        $emailAddress = $employee->getEmailAddress();
        $empPassword = $employee->getEmpPassword();
        $address = $employee->getAddress();
        $phone = $employee->getPhone();
        $photo = $employee->getPhoto();
        $dept_id = $employee->getDeptID();
        $job_id = $employee->getJobID();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $emailAddress, $empPassword, $address, $phone, $photo, $dept_id, $job_id]);
    }

    protected function delEmployee($employeeID) {
        $query = "DELETE FROM `employee` WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$employeeID]);
    }

    protected function editEmpProfile($employee, $employeeID) {
        $query = "UPDATE `employee` SET first_name = ?, last_name = ?, birth_date = ?, gender = ?, email_address = ?, emp_password = ?, `address` = ?, phone = ?, photo = ?, dept_id = ?, job_id = ? WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $firstName = $employee->getFirstName();
        $lastName = $employee->getLastName();
        $birthDate = $employee->getBirthDate();
        $gender = $employee->getGender();
        $emailAddress = $employee->getEmailAddress();
        $empPassword = $employee->getEmpPassword();
        $address = $employee->getAddress();
        $phone = $employee->getPhone();
        $photo = $employee->getPhoto();
        $dept_id = $employee->getDeptID();
        $job_id = $employee->getJobID();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $emailAddress, $empPassword, $address, $phone, $photo, $dept_id, $job_id, $employeeID]);
    }
}
