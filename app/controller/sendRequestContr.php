<?php
 class sendRequestContr{
     public function sendPassReset($emailAddress){


        /**
         * Create a token, the token's format is the user's email,
         * encrypted selector, hashed token, and when the token will expire.
         * 
         */

        $verification_code = rand(100000, 999999);

        $userEmail = $emailAddress;

        include'../repository/resetPassModel.php';
        include'../controller/createMailContro.php';


        /**
         * if deleteing an existing token fails give an echo statement
         * else delete the existing token
         * 
         * edit: not working properly so I commented out, right now it deletes the existing token and 
         * replaces it with a new one.
         */
        $reset_entity = new resetPassModel();
      //   if(!$reset_entity->deleteExisting($userEmail)){
      //       echo "There was an error";
      //       exit();
      //   } else{
         $reset_entity->deleteExisting($userEmail);
      //   }

        $reset_entity->storeToken($userEmail, $verification_code);
        
        $mail_entity = new mailController();

        $mail_entity->createMail($userEmail, $verification_code);

        

     }

     /**
      * 
      */

 }

?>