<?php  

if (isset($_POST["reset"])) {
    include '../config/database.php';
    include '../includes/autoLoader.php';
    include '../controller/resetContr.php';

    $emailAddress = $_POST["email"];

    $resetContr = new forgetContr();
    $resetContr->validateEmail($emailAddress);
}

?>