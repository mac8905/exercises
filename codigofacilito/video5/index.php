<?php

    class Facebook
    {
        // atributos
        public $nombre;
        public $edad;
        private $pass; /*contraseña*/
        
        // metodos
        public function __construct($nombre, $edad, $pass)
        {
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->pass = $pass;
        }
        
        public function verInformacion()
        {
            $this->imprimirInformacion("Nombre", $this->nombre);
            $this->imprimirInformacion("Edad", $this->edad);
            $this->imprimirInformacion("Password", $this->pass);
        }
        
        private function imprimirInformacion($etiqueta, $valor)
        {
            $mensaje = "";
            
            $mensaje .= "$etiqueta: ";
            $mensaje .= $valor;
            $mensaje .= "<br>";
            
            echo $mensaje;
        }
        
        public function cambiarPass() {
            $this->pass = strrev($this->pass);
        }
    }
    
    $facebook = new Facebook("Miguel Caro", 27, "1234");
    $facebook->verInformacion();
    $facebook->cambiarPass();
    $facebook->verInformacion();