<?php
 class sendRequests{
     public function sendPassReset($emailAddress){


        /**
         * Create a token, the token's format is the user's email,
         * encrypted selector, hashed token, and when the token will expire.
         * 
         */

        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);

        $url = "http://localhost/ICS499/ics499-team3/app/view/reset-password.php?selector=".$selector."&validator=".bin2hex($token);

        $expires = date("U") + 900;

        $userEmail = $emailAddress;

        $hashedToken = password_hash($token, PASSWORD_DEFAULT);

        include'../repository/resetPassModel.php';
        include'../controller/createMailContro.php';


        /**
         * if deleteing an existing token fails give an echo statement
         * else delete the existing token
         * 
         * edit: not working properly so I commented out, right now it deletes the existing token and 
         * replaces it with a new one.
         */
        $reset_entity = new resetRequests();
      //   if(!$reset_entity->deleteExisting($userEmail)){
      //       echo "There was an error";
      //       exit();
      //   } else{
         $reset_entity->deleteExisting($userEmail);
      //   }

        $reset_entity->storeToken($userEmail, $selector, $hashedToken, $expires);
        
        $mail_entity = new mailController();

        $mail_entity->createMail($userEmail, $url);

        header("Location:../view/reset-password.php");

     }

     /**
      * 
      */

 }

?>