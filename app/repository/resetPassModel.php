<?php

    class resetRequests extends Database{
        public function storeToken($passResetEmail, $passResetSelector, $passResetToken, $passResetExpires){
            $query = "INSERT INTO passReset (passResetEmail, passResetSelector, passResetToken, passResetExpires) VALUES (?, ?, ?, ?);";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute([$passResetEmail, $passResetSelector, $passResetToken, $passResetExpires]);

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
    }


?>