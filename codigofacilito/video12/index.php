<?php

    function autoload($clase)
    {
        $ruta  = "api/";
        $ruta .= str_replace("\\", "/", $clase);
        $ruta .= ".php";
        
        if (is_readable($ruta)) {
            require_once $ruta;
        } else {
            echo "el archivo no existe";
        }
    }
    
    spl_autoload_extensions('.php');
    spl_autoload_register('autoload');
    
    use Models\Persona as Persona;
    use Controllers\PersonaController as PersonaController;
    
    $persona = new Persona();
    $personaController = new PersonaController();