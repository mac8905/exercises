<?php

    class Vehiculo
    {
        // atributos
        protected $motor = false;
        protected $marca;
        protected $color;
        
        // metodos
        protected function estado()
        {
            $mensaje = "";
            
            if ($this->motor) {
                $mensaje .= "El motor esta encendido.";
            } else {
                $mensaje .= "El motor esta apagado.";
            }
            
            $this->imprimirMensaje($mensaje);
        }
        
        protected function encender()
        {
            $mensaje = "";
            
            if ($this->motor) {
                $mensaje .= "Cuidado el motor ya esta encendido.";
            } else {
                $this->motor = true;
                $mensaje .= "El motor se esta encendiendo.";
            }
            
            $this->imprimirMensaje($mensaje);
        }
        
        private function imprimirMensaje($mensaje)
        {
            $mensaje .= "<br>";
            
            echo $mensaje;
        }
    }
    
    class Moto extends Vehiculo
    {
        public function getEstado()
        {
            $this->estado();
        }
        
        public function getEncender()
        {
            $this->encender();
        }
    }
    
    class CuatriMoto extends Moto
    {
        
    }
    
    $moto = new CuatriMoto();
    $moto->getEstado();
    $moto->getEncender();
    $moto->getEstado();