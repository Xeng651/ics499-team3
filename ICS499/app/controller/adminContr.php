<?php

class AdminContr extends AdminService {

    public function selectAllAdmins() {
        $admins = $this->getAllAdmins();
        return $admins;
    }

    public function selectAdmin($adminID){
        $result = $this->getAdmin($adminID);
        return $result;
    }

    public function selectAdminByEmail($emailAddress) {
        $result = $this->getAdminByEmail($emailAddress);
        return $result;
    }

    public function showTotalAdminNum() {
        return $this->getTotalAdminNum();
    }

    public function createAdmin($admin) {
        $this->setAdmin($admin);
    }

    public function updateAdminProfile($profile, $adminID) {
        $this->editAdminProfile($profile, $adminID);
    }

    public function updateAdminPhoto($adminID, $photo) {
        $this->editAdminPhoto($adminID, $photo);
    }

    public function updateAdminPassword($adminID, $inputedPass) {
        $this->editAdminPassword($adminID, $inputedPass);
    }

}

?>