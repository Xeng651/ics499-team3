<?php  

class AdminService {

    private $adminRepo; 

    function __construct() {
        $this->adminRepo = new AdminRepo();
    }

    public function getAllAdmins() {
        $admins = $this->adminRepo->getAllAdmins();
        return $admins;
    }

    public function getAdmin($adminID){
        $result =  $this->adminRepo->getAdmin($adminID);
        return $result;
    }

    public function getAdminByEmail($emailAddress) {
        $result =  $this->adminRepo->getAdminByEmail($emailAddress);
        return $result;
    }

    public function getTotalAdminNum() {
        $count = $this->adminRepo->getTotalAdminNum();
        return $count;
    }

    public function setAdmin($admin) {
        $this->adminRepo->setAdmin($admin);
    }

    public function editAdminProfile($profile, $adminID) {
        $this->adminRepo->editAdminProfile($profile, $adminID);
    }

    public function editAdminPhoto($adminID, $photo) {
        $this->adminRepo->editAdminPhoto($adminID, $photo);
    }

    public function editAdminPassword($adminID, $inputedPass) {
        $this->adminRepo->editAdminPassword($adminID, $inputedPass);
    }
}

?>