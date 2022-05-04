<?php
class ForgetContr extends ForgetService {

    public function validateEmail($emailAddress) {
        if (empty($emailAddress)) {
            header("Location: ../view/forgot-password.php?reset=empty");
            exit();
        } else {
            if ($this->validEmail($emailAddress)) {
            
                $this->sendPassReset($emailAddress);
                
                header("Location: ../view/reset-password.php?resetpw=sent&email=$emailAddress");
                exit();
            } else {
                header("Location: ../view/forgot-password.php?reset=invalid");
                exit();
            }
        }
    }
}
