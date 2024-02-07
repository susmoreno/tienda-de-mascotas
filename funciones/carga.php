<?php
session_start();

function auto_carga($className){
    $rutaClase = __DIR__ . "/../clases/$className.php";

    if(file_exists($rutaClase)){
        require_once $rutaClase;
    } else {
        die("No pudimos cargar su clase: $className");
    }
}

spl_autoload_register('auto_carga');
?>
