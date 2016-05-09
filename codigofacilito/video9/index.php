<?php

    abstract class Molde
    {
        // metodos
        abstract public function ingresarNombre($nombre);
        abstract public function obtenerNombre();
    }
    
    class Persona extends Molde
    {
        // atributos
        private $nombre;
        
        // metodos
        public function mostrar()
        {
            $mensaje  = "";
            $mensaje .= "Nombre: ";
            $mensaje .= $this->obtenerNombre();
            echo $mensaje."<br>";
        }
        
        public function ingresarNombre($nombre, $apellido="N/A")
        {
            $this->nombre = $nombre;
            $this->nombre .= " ";
            $this->nombre .= $apellido;
        }
        
        public function obtenerNombre()
        {
            return $this->nombre;
        }
    }
    
    $miguel = new Persona();
    $miguel->ingresarNombre("Miguel", "Caro");
    $miguel->mostrar();
    
    $juan = new Persona();
    $juan->ingresarNombre("Juan");
    $juan->mostrar();