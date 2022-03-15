<?php

class ResetPassRepo extends Database{

        public function storeToken($passResetEmail, $passCode){
            $query = "INSERT INTO passReset (passResetEmail, passResetCode) VALUES (?, ?);";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$passResetEmail, $passCode]);
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

        public function validateCode($code, $email){
            $query = "SELECT passResetCode FROM passreset WHERE passResetEmail = ? AND passResetCode = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$email, $code]);
            $results = $stmt->fetchAll();
            return $results;
        }

        public function updateEmpPW($email, $new_pass){
            $query = "UPDATE employee SET emp_password = ? WHERE email_address = ?";
            $stmt = $this->connect()->prepare($query);
            $hashed_pw = password_hash($new_pass, PASSWORD_DEFAULT);
            $stmt->execute([$hashed_pw, $email]);

        }

        public function updateAdminPW($email, $new_pass){
            $query = "UPDATE `admin` SET admin_password = ? WHERE email_address = ?";
            $stmt = $this->connect()->prepare($query);
            $hashed_pw = password_hash($new_pass, PASSWORD_DEFAULT);
            $stmt->execute([$hashed_pw, $email]);

        }
    }

?>
