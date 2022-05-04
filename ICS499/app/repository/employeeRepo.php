<?php

class EmployeeRepo extends Database {

    public function getAllEmployees() {
        $query = "SELECT * FROM `employee`";
        $result = $this->connect()->query($query);
        return $result;
    }

    public function getEmployee($employeeID) { 
        $query = "SELECT * FROM `employee` WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$employeeID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getEmployeeByEmail($emailAddress) {
        $query = "SELECT * FROM `employee` WHERE email_address = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$emailAddress]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getTotalEmployeeNum() {
        $query = "SELECT COUNT(*) FROM `employee`";
        $stmt = $this->connect()->query($query);
        $count = $stmt->fetchColumn();
        return $count;
    }

    public function setEmployee($employee) {
        $query = "INSERT INTO `employee`(first_name, last_name, birth_date, gender, email_address, emp_password, `address`, phone, `role`, date_joined, photo, dept_id, job_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
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
        $dateJoined = $employee->getDateJoined();
        $photo = $employee->getPhoto();
        $dept_id = $employee->getDeptID();
        $job_id = $employee->getJobID();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $emailAddress, $empPassword, $address, $phone, $role, $dateJoined, $photo, $dept_id, $job_id]);
    }

    public function delEmployee($employeeID) {
        $query = "DELETE FROM `employee` WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$employeeID]);
    }

    public function editEmp($employee, $employeeID) {
        $query = "UPDATE `employee` SET first_name = ?, last_name = ?, birth_date = ?, gender = ?, email_address = ?, `address` = ?, phone = ?, date_joined = ?, dept_id = ?, job_id = ? WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $firstName = $employee->getFirstName();
        $lastName = $employee->getLastName();
        $birthDate = $employee->getBirthDate();
        $gender = $employee->getGender();
        $emailAddress = $employee->getEmailAddress();
        $address = $employee->getAddress();
        $phone = $employee->getPhone();
        $dateJoined = $employee->getDateJoined();
        $deptID = $employee->getDeptID();
        $jobID = $employee->getJobID();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $emailAddress, $address, $phone, $dateJoined, $deptID, $jobID, $employeeID]);
    }

    public function editEmpProfile($profile, $employeeID) {
        $query = "UPDATE `employee` SET first_name = ?, last_name = ?, birth_date = ?, gender = ?, `address` = ?, phone = ? WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $firstName = $profile->getFirstName();
        $lastName = $profile->getLastName();
        $birthDate = $profile->getBirthDate();
        $gender = $profile->getGender();
        $address = $profile->getAddress();
        $phone = $profile->getPhone();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $address, $phone, $employeeID]);
    }

    public function editEmpPhoto($employeeID, $photo) {
        $query = "UPDATE `employee` SET photo = ? WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$photo, $employeeID]);
    }

    public function editEmpPassword($employeeID, $inputedPass) {
        $query = "UPDATE `employee` SET emp_password = ? WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $empPassword = password_hash($inputedPass, PASSWORD_DEFAULT);
        $stmt->execute([$empPassword, $employeeID]);
    }

    public function editEmpNumLeave($employeeID, $num) {
        $query = "UPDATE `employee` SET num_leave = ? WHERE employee_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$num, $employeeID]);
    }

}

?>