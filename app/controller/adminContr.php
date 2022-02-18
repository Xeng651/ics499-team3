<?php

class AdminContr extends AdminModel {

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

    public function createAdmin($admin) {
        $this->setAdmin($admin);
    }

    public function updateAdminProfile($admin, $adminID) {
        $this->editAdminProfile($admin, $adminID);
    }

    public function updateAdminPassword($adminID, $inputedPass) {
        $this->editAdminPassword($adminID, $inputedPass);
    }

}

?>