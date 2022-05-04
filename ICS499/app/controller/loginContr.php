<?php

class LoginContr extends LoginSec {

    public function checkLoginCred($emailAddress, $inputedPass) {
        if ($this->emptyInput($emailAddress, $inputedPass)) {
           header("Location: ../view/login.php?login=empty&email=$emailAddress");
           exit();
        } else {
            if ($this->validAdminLogin($emailAddress, $inputedPass)) {
                $leaveContr = new LeaveContr();
                
                header("Location: ../view/dashboard.php");
                exit();
            } else if ($this->validEmpLogin($emailAddress, $inputedPass)) {
                $leaveContr = new LeaveContr();

                header("Location: ../view/dashboard.php");
                exit();
            } else {
                header("Location: ../view/login.php?login=invalid");
                exit();
            }
        }
    }

}

?>
