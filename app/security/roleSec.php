<?php

class RoleSec {

    private $empRepo; 
    private $adminRepo;

    function __construct() {
        $this->empRepo = new EmployeeRepo();
        $this->adminRepo = new AdminRepo();
    }

    public function getRoleByEmail($email) {
        $role = "";
        $empResult = $this->empRepo->getEmployeeByEmail($email);
        $adminResult = $this->adminRepo->getAdminByEmail($email);

        if (!empty($empResult) || !empty($adminResult)) {
            if (!empty($empResult)) {
                $role = "Employee";
            } else {
                $role = "Admin";
            }
        } 

        return $role;
    }
}

?>