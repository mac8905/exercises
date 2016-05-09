<?php

    interface Auto
    {
        public function encender();
        public function apagar();
    }
    
    interface Gasolina extends Auto
    {
        public function varciarTanque();
        public function llenarTanque($cantidad);
    }
    
    Class Deportivo implements Gasolina
    {
        // atributos
        private $estado = false;
        private $tanque = 0;
        
        // metodos
        public function estado()
        {
            $mensaje  = "";
            $mensaje .= "El auto se encuentra ";
            
            if ($this->estado) {
                $mensaje .= "encendido y tiene ";
                $mensaje .= $this->tanque;
                $mensaje .= " de litros en el tanque";
            } else {
                $mensaje .= "apagado";
            }
            
            echo $mensaje."<br>";
        }
        
        public function encender()
        {
            $mensaje = "";
            
            if ($this->estado) {
                $mensaje .= "El auto ya se encuentra encendido";
            } else {
                if ($this->tanque <= 0) {
                    $mensaje .= "No puede encender el auto porque el tanque esta vacio.";
                } else {
                    $mensaje .= "Auto encendido";
                    $this->estado = true;
                }
            }
            
            echo $mensaje."<br>";
        }
        
        public function apagar()
        {
            $mensaje = "";
            
            if ($this->estado) {
                $mensaje .= "Auto apagado";
                $this->estado = false;
            } else {
                $mensaje .= "El auto ya se encuentra apagado";
            }
            
            echo $mensaje."<br>";
        }
        
        public function varciarTanque()
        {
            $this->tanque = 0;
        }
        
        public function llenarTanque($cantidad)
        {
            $this->tanque = $cantidad;

            $mensaje = "";
            $mensaje .= "Ha llenado el tanque con ";
            $mensaje .= $this->tanque;
            $mensaje .= " litros";
            
            echo $mensaje."<br>";
        }
        
        public function usar($km)
        {
            $mensaje = "";
            
            if ($this->estado) {
                $reducir = $km/3;
                $this->tanque -= $reducir;
                
                $mensaje .= "Ha recorrido ";
                $mensaje .= $km;
                $mensaje .= " km.";
                
                if ($this->tanque <= 0) {
                    $this->estado = false;
                }
            } else {
                $mensaje .= "El auto esta apagado y no se puede usar.";
            }
            
            echo $mensaje."<br>";
        }
    }
    
    $lamborgini = new Deportivo();
    $lamborgini->llenarTanque(100);
    $lamborgini->encender();
    $lamborgini->usar(120);
    $lamborgini->estado();
    $lamborgini->usar(120);
    $lamborgini->estado();