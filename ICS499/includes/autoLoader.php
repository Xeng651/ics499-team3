<?php 

spl_autoload_register('autoloadModel');
spl_autoload_register('autoloadContr');

function autoloadModel($className) {
    $path = "model/". $className. ".php";
    if (file_exists($path)) {
        include $path;
    }
}

function autoloadContr($className) {
    $path = "controller/". $className. ".php";
    if (file_exists($path)) {
        include $path;
    }
}


?>