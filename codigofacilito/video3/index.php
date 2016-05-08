<?php

    class Persona
    {
        // atributos
        public $nombre = array();
        public $apellido = array();
        
        // metodos
        public function guardar($nombre, $apellido)
        {
            array_push($this->nombre, $nombre);
            array_push($this->apellido, $apellido);
        }
        
        public function mostrar()
        {
            for ($i = 0; $i < count($this->nombre); $i++) {
                $this->formato($this->nombre[$i], $this->apellido[$i]);
            }
        }
        
        public function formato($nombre, $apellido)
        {
            $mensaje = "";
            
            $mensaje .= "Nombre: " . $nombre;
            $mensaje .= " | ";
            $mensaje .= "Apellido: " . $apellido;
            $mensaje .= "<br>";
            
            echo $mensaje;
        }
    }
    
    $persona = new Persona();
    $persona->guardar("Miguel", "Caro");
    $persona->guardar("Wilmar", "Caicedo");
    $persona->mostrar();