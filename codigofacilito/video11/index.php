<?php

    trait MoldePersona
    {
        // atributos
        public $nombre;
        
        // metodos
        public function mostrarNombre()
        {
            echo $this->nombre;
        }
        
        abstract public function asignarNombre($nombre);
    }
    
    trait Trabajador
    {
        protected function mensaje()
        {
            return ", bienvenido.";
        }
    }
    
    class Persona
    {
        use MoldePersona, Trabajador;
        
        public function asignarNombre($nombre)
        {
            $this->nombre = $nombre.$this->mensaje();
        }
    }
    
    $persona = new Persona();
    $persona->asignarNombre("Miguel");
    $persona->mostrarNombre();