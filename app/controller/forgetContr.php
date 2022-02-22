<?php
class forgetContr extends LoginSec {
        public function validateEmail($emailAddress){
            if ($this->emptyEmail($emailAddress)) {
                header("Location: ../view/forgot-password.php?reset=empty&email=$emailAddress");
                exit();
        }
        else {
                if ($this->validEmail($emailAddress)){
                    /**
                     * if the email exists send an email to the address
                     * take the user back to the reset page and tell them
                     * to check their email
                     */              
                    include '../controller/sendRequestContr.php';       
                    $sendContr = new sendRequestContr();
                    $sendContr->sendPassReset($emailAddress);
                    header("Location: ../view/reset-password.php?resetpw=sent&email=$emailAddress");
                    exit();
                }
                else{
                    /**
                     * if the email does not exist in the database
                     * redicrect them back to the reset pw page
                     * and give them an error msg  saying that 
                     * the email address is invalid
                     */
                    header("Location: ../view/forgot-password.php?reset=invalid");
                    exit();
                }
        }
    }
}
?>