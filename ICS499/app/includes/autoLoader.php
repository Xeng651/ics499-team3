<?php 

spl_autoload_register('autoloadModel');
spl_autoload_register('autoloadContr');
spl_autoload_register('autoloadRepository');
spl_autoload_register('autoloadSecurity');
spl_autoload_register('autoloadService');

// if the session is valid, and the time is greater than 15 minutes kill the session else reset the timer.
if (isset($_SESSION['LAST_ACTIVITY'])) {
    if ((time() - $_SESSION['LAST_ACTIVITY']) > 900) {
    // last request was more than 15 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("Location: ../view/login.php");
    }
}

$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

function autoloadModel($className) {
    $path = "../model/". $className. ".php";
    if (file_exists($path)) {
        include $path;
    }
}

function autoloadContr($className) {
    $path = "../controller/". $className. ".php";
    if (file_exists($path)) {
        include $path;
    }
}

function autoloadRepository($className) {
    $path = "../repository/". $className. ".php";
    if (file_exists($path)) {
        include $path;
    }
}

function autoloadSecurity($className) {
    $path = "../security/". $className. ".php";
    if (file_exists($path)) {
        include $path;
    }
}

function autoloadService($className) {
    $path = "../service/". $className. ".php";
    if (file_exists($path)) {
        include $path;
    }
}
