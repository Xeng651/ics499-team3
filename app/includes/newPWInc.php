<?php  

if (isset($_POST["resetpw"])) {
    include '../config/database.php';
    include '../includes/autoLoader.php';
    include '../controller/newPWValidatorContr.php';

    $newPass = $_POST["newpass"];
    $rePass = $_POST["repassword"];
    $email = $_POST["email"];
    $code = $_POST["code"];

    $newPW_entity = new PWValidator();

    $newPW_entity->isEmpty($newPass, $rePass, $email, $code);
    


}

?>