<?php

    namespace Config;
    
    class Autoload
    {
        public static function run()
        {
            spl_autoload_register(function($clase)
            {
                $ruta .= str_replace("\\", "/", $clase);
                $ruta .= ".php";
                
                if (is_readable($ruta)) {
                    include_once $ruta;
                } else {
                    echo "el archivo no existe";
                }
            });
        }
    }