<?php

    namespace Config;
    
    class Peticion
    {
        private $controlador;
        private $metodo;
        private $argumento;
        
        public function  __construct()
        {
            if (isset($_GET["url"])) {
                $ruta = filter_input(INPUT_GET, "url", FILTER_SANITIZE_URL);
                $ruta = explode("/", $ruta);
                $ruta = array_filter($ruta);
                
                $this->controlador = ucfirst(strtolower(array_shift($ruta)));
                $this->metodo      = strtolower(array_shift($ruta));
                $this->argumento   = $ruta;
                
                if (!$this->metodo) { $this->metodo = "index"; }
            } else {
                $this->controlador = "Estudiantes";
                $this->metodo = "index";
            }
        }
        
        public function __get($property) {
            if (property_exists($this, $property)) {
                return $this->$property;
            }
        }
    
        public function __set($property, $value) {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            }
        }
    }