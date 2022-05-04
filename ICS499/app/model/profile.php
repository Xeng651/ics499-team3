<?php 

class Profile {

    private $firstName;
    private $lastName;
    private $birthDate;
    private $gender;
    private $address;
    private $phone;

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

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPhone() {
        return $this->phone;
    }
}
