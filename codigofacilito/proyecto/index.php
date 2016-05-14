<?php
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', realpath(dirname(__FILE__)) . DS);

    require_once "Config/Autoload.php";
    
    use Config\Autoload as Autoload;
    use Config\Enrutador as Enrutador;
    use Config\Peticion as Peticion;
    
    Autoload::run();
    Enrutador::run(new Peticion());