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
         
            if (password_verify($inputedPass, $password)) {
                $_SESSION['employeeID'] = $employeeID;
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
            if (password_verify($inputedPass, $password)) {
                $_SESSION['adminID'] = $adminID;
                $flag = true;
            }
        }
        return $flag;
    }
 
}

?>