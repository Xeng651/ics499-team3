<?php

class AdminRepo extends Database {

    public function getAllAdmins() {
        $query = "SELECT * FROM `admin`";
        $result = $this->connect()->query($query);
        return $result;
    }

    public function getAdmin($adminID) {
        $query = "SELECT * FROM `admin` WHERE admin_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$adminID]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getAdminByEmail($emailAddress) { 
        $query = "SELECT * FROM `admin` WHERE email_address = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$emailAddress]);
        $results = $stmt->fetchAll();
        return $results;
    }

    public function getTotalAdminNum() {
        $query = "SELECT COUNT(*) FROM `admin`";
        $stmt = $this->connect()->query($query);
        $count = $stmt->fetchColumn();
        return $count;
    }

    public function setAdmin($admin) {
        $query = "INSERT INTO `admin`(first_name, last_name, birth_date, gender, phone, email_address, admin_password, photo, `role`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $firstName = $admin->getFirstName();
        $lastName = $admin->getLastName();
        $birthDate = $admin->getBirthDate();
        $gender = $admin->getGender();
        $phone = $admin->getPhone();
        $emailAddress = $admin->getEmailAddress();
        $adminPassword = password_hash($admin->getAdminPassword(), PASSWORD_DEFAULT);
        $photo = $admin->getPhoto();
        $role = $admin->getRole();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender,$phone, $emailAddress, $adminPassword, $photo, $role]);
    }

    public function editAdminProfile($profile, $adminID) {
        $query = "UPDATE `admin` SET first_name = ?, last_name = ?, birth_date = ?, gender = ?, phone = ? WHERE admin_id = ?";
        $stmt = $this->connect()->prepare($query);
        $firstName = $profile->getFirstName();
        $lastName = $profile->getLastName();
        $birthDate = $profile->getBirthDate();
        $gender = $profile->getGender();
        $phone = $profile->getPhone();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $phone, $adminID]);
    }

    public function editAdminPhoto($adminID, $photo) {
        $query = "UPDATE `admin` SET photo = ? WHERE admin_id = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$photo, $adminID]);
    }

    public function editAdminPassword($adminID, $inputedPass) {
        $query = "UPDATE `admin` SET admin_password = ? WHERE admin_id = ?";
        $stmt = $this->connect()->prepare($query);
        $adminPassword = password_hash($inputedPass, PASSWORD_DEFAULT);
        $stmt->execute([$adminPassword, $adminID]);
    }
}
