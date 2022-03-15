<?php  

session_start();

class LoginSec {

    private $employeeRepo;
    private $adminRepo;

    function __construct() {
        $this->employeeRepo = new EmployeeRepo();
        $this->adminRepo = new AdminRepo();
    }

    protected function emptyInput($emailAddress, $inputedPass) {
        $flag = false;
        if (empty($emailAddress) || empty($inputedPass)) {
            $flag = true;
        }
        return $flag;
    }

    protected function validEmpLogin($emailAddress, $inputedPass) {
        $flag = false;
        $result = $this->employeeRepo->getEmployeeByEmail($emailAddress);
        if (!empty($result)) {
            $employeeID = $result[0]['employee_id'];
            $password = $result[0]['emp_password'];
            $role = $result[0]['role'];
            
            if (password_verify($inputedPass, $password)) {
                $_SESSION['valid_user'] = $employeeID;
                $_SESSION['role'] = $role;
                $flag = true;
            } 
        }
        return $flag;
    }

    protected function validAdminLogin($emailAddress, $inputedPass) {
        $flag = false;
        $result = $this->adminRepo->getAdminByEmail($emailAddress);
        if (!empty($result)) {
            $adminID = $result[0]['admin_id'];
            $password = $result[0]['admin_password'];
            $role = $result[0]['role'];

            if (password_verify($inputedPass, $password)) {
                $_SESSION['valid_user'] = $adminID;
                $_SESSION['role'] = $role;
                $flag = true;
            }
        }
        return $flag;
    }
 
}

?>