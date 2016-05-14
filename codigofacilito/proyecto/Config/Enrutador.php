<?php

    namespace Config;
    
    class Enrutador
    {
        public static function run(Peticion $peticion)
        {
            $controlador = $peticion->controlador;
            $ruta        = ROOT . "Controllers" . DS . $controlador . ".php";
            $metodo      = $peticion->metodo;
            
            echo $ruta . "<br>";
            
            if ($metodo == "index.php") {
                $metodo = "index";
            }
            
            $argumento   = $peticion->argumento;
            
            if (is_readable($ruta)) {
                require_once $ruta;
                $mostrar = "Controllers\\" . $controlador;
                $controlador = new $mostrar();
                
                if (!isset($argumento)) {
                    call_user_func(array($controlador, $metodo));
                } else {
                    call_user_func_array(array($controlador, $metodo), $argumento);
                }
            } else {
                echo "La ruta no existe" . "<br>";
            }
        }
    }