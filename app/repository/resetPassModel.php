<?php

    class resetRequests extends Database{
        public function storeToken($passResetEmail, $passResetExpires, $passCode){
            $query = "INSERT INTO passReset (passResetEmail, passResetExpires, passResetCode) VALUES (?, ?, ?);";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$passResetEmail, $passResetExpires, $passCode]);

        }

        public function deleteToken($passResetEmail){
            $query = "DELETE FROM passReset WHERE passResetEmail=?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$passResetEmail]);
        }

        public function deleteExisting($passResetEmail){
            $query = "DELETE FROM passReset WHERE passResetEmail=?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$passResetEmail]);
        }

        /**
         * check the DB for the code and email address, if they both exist return true, else return false.
         */
        public function validateCode($code, $email){
            $query = "SELECT * FROM passreset WHERE passResetEmail = ? and passResetCode = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$email, $code]);
            if(!empty($query)){
                return true;
            } else{
                return false;
            }
        }
        public function updatePW($email, $new_pass){
            $query = "UPDATE employee SET emp_password = ? WHERE email_address = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$new_pass, $email]);

        }
    }


?>