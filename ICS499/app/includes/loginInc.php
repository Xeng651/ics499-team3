<?php  

if (isset($_POST["login"])) {
    include '../config/database.php';
    include '../includes/autoLoader.php';

    $emailAddress = $_POST["email"];
    $password = $_POST["password"];

    $loginContr = new LoginContr();
    $loginContr->checkLoginCred($emailAddress, $password);
}

?>
