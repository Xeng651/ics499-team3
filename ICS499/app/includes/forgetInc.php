<?php  

if (isset($_POST["reset"])) {
    include '../config/database.php';
    include '../includes/autoLoader.php';

    $emailAddress = $_POST["email"];

    $forgetContr = new ForgetContr();
    $forgetContr->validateEmail($emailAddress);
}

?>
