<?php  

if (isset($_POST["resetpw"])) {
    include '../config/database.php';
    include '../includes/autoLoader.php';

    $newPass = $_POST["newpass"];
    $rePass = $_POST["repassword"];
    $email = $_POST["email"];
    $code = $_POST["code"];

    $resetContr = new ResetContr();
    $resetContr->resetPass($newPass, $rePass, $email, $code);  
    
} elseif (isset($_POST["submitPass"])) {
    $currentPass = $_POST["currentpass"];
    $newPass = $_POST["newpass"];
    $rePass = $_POST["repassword"];
    $id = $_SESSION['valid_user'];

    $resetContr = new ResetContr();

    $resetContr->changePass($currentPass, $newPass, $rePass, $id);
}

?>