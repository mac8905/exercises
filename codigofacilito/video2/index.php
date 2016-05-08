<?php

    class Persona
    {
        // atributos
        public $nombre = "Miguel";
        
        // metodos
        public function hablar($mensaje)
        {
            echo $mensaje;
        }
    }
    
    $persona = new Persona();
    $persona->hablar($persona->nombre . ", Saludos desde CodigoFacilito");