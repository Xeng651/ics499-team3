<?php

class ResetService {

    private $resetPassRepo; 
    private $empRepo; 
    private $adminRepo;
    private $roleSec;

    function __construct() {
        $this->resetPassRepo = new ResetPassRepo();
        $this->empRepo = new EmployeeRepo();
        $this->adminRepo = new AdminRepo();
        $this->roleSec = new RoleSec();
    }

    public function validEmail($email) {
        $flag = false;
        $result = $this->empRepo->getEmployeeByEmail($email);

        if (!empty($result)) {
            $flag = true;
        } else {
            $result = $this->adminRepo->getAdminByEmail($email);
        }
        
    }

    public function isEmpty($newpass, $repass, $code) {
        $flag = false;
        if(empty($newpass) || empty($repass) || empty($code)){
           $flag = true;
        }

        return $flag;
    }

    public function changePassIsEmpty($currentpass, $newpass, $repass) {
        $flag = false;
        if(empty($newpass) || empty($repass) || empty($currentpass)){
           $flag = true;
        }

        return $flag;
    }

    public function passIsMatching($newpass, $repass) {
        $flag = false;
        if($newpass == $repass) {
            $flag = true;
        }
        return $flag;
    }

    public function isValid($newpass, $email, $code){
        $flag = false;
        $result = $this->resetPassRepo->validateCode($code, $email);   
        if (!empty($result)) {
            
            $role = $this->roleSec->getRoleByEmail($email);
            if ($role == "Admin") {
                $this->resetPassRepo->updateAdminPW($email, $newpass);
            } else {
                $this->resetPassRepo->updateEmpPW($email, $newpass);
            }
            
            $flag = true;
        }
        
        return $flag;
    }

    public function updatePW($id, $newpass) {
        $role = $_SESSION['role'];
        if ($role == "Admin") {
            $this->adminRepo->editAdminPassword($id, $newpass);
        } else {
            $this->empRepo->editEmpPassword($id, $newpass);
        }
    }

    public function isValidPassword($inputedPass, $id) {
        $flag = false;
        $role = $_SESSION['role'];

        if ($role == "Admin") {
            $result = $this->adminRepo->getAdmin($id);
            $password = $result[0]['admin_password'];
        } else {
            $result = $this->empRepo->getEmployee($id);
            $password = $result[0]['emp_password'];
        }

        if (password_verify($inputedPass, $password)) {
            $flag = true;
        }
        return $flag;
    }
}

?>
