<?php
    class PWValidator{
        public function isEmpty($newpass, $repass, $email, $code){
            if(empty($newpass) || empty($repass) || empty($code)){
                header("Location: ../view/reset-password.php?resetpw=empty&email=$email");
            } else{
                $this->isValid($newpass, $repass, $email, $code);
            }
        }
        /**
         * Check if the two passwords are the same, if not give them an error, else check if the code exists in the database.
         * If true, update the new password, if not true give an error.
         */
        public function isValid($newpass, $repass, $email, $code){
            include '../repository/resetPassModel.php';
            if($newpass == $repass){
                $reset_entity = new resetRequests();
                if($reset_entity->validateCode($code, $email) == true){
                    $hashed_pw = password_hash($newpass, PASSWORD_DEFAULT);
                    
                    $reset_entity->updatePW($email, $hashed_pw);
                    header("Location: ../view/login.php");
                } else{
                    header("Location: ../view/reset-password.php?resetpw=invalid&email=$email");
                }
                
            } else{
                header("Location: ../view/reset-password.php?resetpw=mismatch&email=$email");
            }
        }
    }

?>