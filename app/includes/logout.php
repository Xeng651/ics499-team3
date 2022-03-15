<?php  

session_start();

include '../includes/autoLoader.php';

unset($_SESSION['valid_user']);
unset($_SESSION['role']);
unset($_SESSION['user']);
session_destroy();

header("Location: ../view/login.php?logout=success");

?>
