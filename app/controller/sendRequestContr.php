<?php
 class sendRequests{
     public function sendPassReset($emailAddress){


        /**
         * Create and insert a token and put it into the database
         * 
         */

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "http://localhost/ICS499/ics499-team3/app/view/reset-password.php?selector=" . $selector . "& validator=" . bin2hex($token);

        $expires = date("U") + 900;

        $userEmail = $emailAddress;

        $sql = "DELETE FROM passReset WHERE passResetEmail=?";
        $stmt = mysqli_stmt_init($pdo_con);
        if(!mysqli_stmt_prepare($stmt, $sqli)){
            header("Location: ../view/forgot-password.php?reset=stmtfail");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $userEmail);
            mysqli_stmt_execute($stmt);
        }
        

        $sql = "INSERT INTO passReset (passResetEmail, passResetSelector, passResetToken, passResetExpires) VALUES (?, ?, ?, ?);";

        $stmt = mysqli_stmt_init($pdo_con);
        if(!mysqli_stmt_prepare($stmt, $sqli)){
            header("Location: ../view/forgot-password.php?reset=stmtfail");
            exit();
        }
        else{

            $hashedToken = password_hash($token, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        mysqli_close($pdo_con);


     }

     /**
      * 
      */

 }

?>