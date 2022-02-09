<?php

class AdminContr extends AdminModel {

    public function selectAllAdmins() {
        $admins = $this->getAllAdmins();
        return $admins;
    }

    public function selectAdmin($emailAddress){
        $result = $this->getAdmin($emailAddress);
        return $result;
    }

    public function createAdmin($admin) {
        $this->setAdmin($admin);
    }

}

?>