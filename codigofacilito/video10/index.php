<?php

    function autoload($clase)
    {
        include "clases/$clase.php";
        spl_autoload($clase);
    }
    
    spl_autoload_extensions('.php');
    spl_autoload_register('autoload');
    
    $persona = new Persona();
    $auto = new Auto();