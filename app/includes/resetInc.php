<?php  

if (isset($_POST["resetpw"])) {
    include '../config/database.php';
    include '../includes/autoLoader.php';
    include '../controller/resetContr.php';

    $newPass = $_POST["newpass"];
    $rePass = $_POST["repassword"];
    $email = $_POST["email"];
    $code = $_POST["code"];

    echo $email;

    $newPW_entity = new resetContr();

    $newPW_entity->isEmpty($newPass, $rePass, $email, $code);
    


}

?>