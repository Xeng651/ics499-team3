<?php 

class Admin {

    private $firstName;
    private $lastName;
    private $birthDate;
    private $gender;
    private $emailAddress;
    private $adminPassword;
    private $photo;
    private $role;

    function __construct() {

    }

    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function setbirthDate($birthDate) {
        $this->birthDate = $birthDate;
    }

    public function getBirthDate() {
        return $this->birthDate;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getgender() {
        return $this->gender;
    }

    public function setEmailAddress($emailAddress) {
        $this->emailAddress = $emailAddress;
    }

    public function getEmailAddress() {
        return $this->emailAddress;
    }

    public function setAdminPassword($adminPassword) {
        $this->adminPassword = $adminPassword;
    }

    public function getAdminPassword() {
        return $this->adminPassword;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getRole() {
        return $this->role;
    }
}

?>