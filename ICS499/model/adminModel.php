<?php

class AdminModel extends Database {

    protected function getAllAdmins() {
        $query = "SELECT * FROM `admin`";
        $result = $this->connect()->query($query);
        return $result;
    }

    protected function getAdmin($emailAddress) { 
        $query = "SELECT * FROM `admin` WHERE email_address = ?";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute([$emailAddress]);

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function setAdmin($admin) {
        $query = "INSERT INTO `admin`(first_name, last_name, birth_date, gender, email_address, admin_password, photo) VALUES(?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);
        $firstName = $admin->getFirstName();
        $lastName = $admin->getLastName();
        $birthDate = $admin->getBirthDate();
        $gender = $admin->getGender();
        $emailAddress = $admin->getEmailAddress();
        $adminPassword = $admin->getAdminPassword();
        $photo = $admin->getPhoto();
        $stmt->execute([$firstName, $lastName, $birthDate, $gender, $emailAddress, $adminPassword, $photo]);
    }
}
