<?php  

session_start();

class LoginSec {

    private $empContr;
    private $adminContr;

    function __construct() {
        $this->empContr = new EmployeeContr();
        $this->adminContr = new AdminContr();
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
        $result = $this->empContr->selectEmployeeByEmail($emailAddress);
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
        $result = $this->adminContr->selectAdminByEmail($emailAddress);
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

    /**
     * select employee by email address, if it's not false set flag to true
     * and return flage else return flag as false.
     */
    protected function validEmail($emailAddress){
        $flag = false;
        $result = $this->empContr->selectEmployeeByEmail($emailAddress);
        if (!empty($result)) {

                $flag = true;

        }
        return $flag;
    }
    /**
     * If the email address is empty return true, if not return false.
     */
    protected function emptyEmail($emailAddress) {
        $flag = false;
        if (empty($emailAddress)) {
            $flag = true;
        }
        return $flag;
    }
 
}

?>