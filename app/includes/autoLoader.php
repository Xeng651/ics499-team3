<?php 

spl_autoload_register('autoloadModel');
spl_autoload_register('autoloadContr');
spl_autoload_register('autoloadRepository');
spl_autoload_register('autoloadSecurity');
spl_autoload_register('autoloadService');

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

?>