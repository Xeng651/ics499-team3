<?php 

class Employee {

    private $firstName;
    private $lastName;
    private $birthDate;
    private $gender;
    private $emailAddress;
    private $empPassword;
    private $address;
    private $phone;
    private $dateJoined;
    private $role;
    private $photo;
    private $dept_id;
    private $job_id;

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

    public function setBirthDate($birthDate) {
        $this->birthDate = $birthDate;
    }

    public function getBirthDate() {
        return $this->birthDate;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function getGender() {
        return $this->gender;
    }

    public function setEmailAddress($emailAddress) {
        $this->emailAddress = $emailAddress;
    }

    public function getEmailAddress() {
        return $this->emailAddress;
    }

    public function setEmpPassword($empPassword) {
        $this->empPassword = $empPassword;
    }

    public function getEmpPassword() {
        return $this->empPassword;
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

    public function setDateJoined($dateJoined) {
        $this->dateJoined = $dateJoined;
    }

    public function getDateJoined() {
        return $this->dateJoined;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getRole() {
        return $this->role;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setDeptID($dept_id) {
        $this->dept_id = $dept_id;
    }

    public function getDeptID() {
        return $this->dept_id;
    }

    public function setJobID($job_id) {
        $this->job_id = $job_id;
    }

    public function getJobID() {
        return $this->job_id;
    }
}

?>
