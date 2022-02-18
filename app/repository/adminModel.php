<?php

class AdminModel extends Database {

    protected function getAllAdmins() {
        $query = "SELECT * FROM `admin`";
        $result = $this->connect()->query($query);
        return $result;
    }

    protected function getAdmin($adminID) {
        $query = "SELECT * FROM `admin` WHERE admin_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$adminID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getAdminByEmail($emailAddress) { 
        $query = "SELECT * FROM `admin` WHERE email_address = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$emailAddress]);
        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setAdmin($admin) {
        $query = "INSERT INTO `admin`(first_name, last_name, birth_date, gender, email_address, admin_password, photo, `role`) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $firstName = $admin->getFirstName();
        $lastName = $admin->getLastName();
        $birthDate = $admin->getBirthDate();
        $gender = $admin->getGender();
        $emailAddress = $admin->getEmailAddress();
        $adminPassword = password_hash($admin->getAdminPassword(), PASSWORD_DEFAULT);
        $photo = $admin->getPhoto();
        $role = $admin->getRole();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $emailAddress, $adminPassword, $photo, $role]);
    }

    protected function editAdminProfile($admin, $adminID) {
        $query = "UPDATE `admin` SET first_name = ?, last_name = ?, birth_date = ?, gender = ?, email_address = ?, admin_password = ?, photo = ?, `role` = ? WHERE admin_id = ?";
        $stmt = $this->connect()->prepare($query);
        $firstName = $admin->getFirstName();
        $lastName = $admin->getLastName();
        $birthDate = $admin->getBirthDate();
        $gender = $admin->getGender();
        $emailAddress = $admin->getEmailAddress();
        $adminPassword = $admin->getAdminPassword();
        $photo = $admin->getPhoto();
        $role = $admin->getRole();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $emailAddress, $adminPassword, $photo, $role, $adminID]);
    }

    protected function editAdminPassword($adminID, $inputedPass) {
        $query = "UPDATE `admin` SET admin_password = ? WHERE admin_id = ?";
        $stmt = $this->connect()->prepare($query);
        $adminPassword = password_hash($inputedPass, PASSWORD_DEFAULT);
        $stmt->execute([$adminPassword, $adminID]);
    }
}
