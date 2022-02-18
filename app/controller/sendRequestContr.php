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

        $hashedToken = password_hash($token, PASSWORD_DEFAULT);

        include'../repository/resetPassModel.php';

        $reset_entity = new resetRequests();
        $reset_entity->storeToken($userEmail, $selector, $hashedToken, $expires);

        header("Location:../view/reset-password.php");

     }

     /**
      * 
      */

 }

?>