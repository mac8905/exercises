<?php

    class Loteria
    {
        // atributos
        public $numero;
        public $intentos;
        public $resultado = false;
        
        // metodos
        public function __construct($numero, $intentos)
        {
            $this->numero = $numero;
            $this->intentos = $intentos;
        }
        
        public function sortear()
        {
            $minimo = $this->numero / 2;
            $maximo = $this->numero * 2;
            
            for ($i = 0; $i < $this->intentos; $i++) {
                $int = rand($minimo, $maximo);
                $this->intentos($int);
            }
        }
        
        public function intentos($int)
        {
            $mensaje = "";
            
            if ($int == $this->numero) {
                $mensaje .= "<b>";
                $mensaje .= $int;
                $mensaje .= " == ";
                $mensaje .= $this->numero;
                $mensaje .= "</b>";
                
                $this->resultado = true;
            } else {
                $mensaje .= $int;
                $mensaje .= " != ";
                $mensaje .= $this->numero;
            }
            
            $mensaje .= "<br>";
            
            echo $mensaje;
        }
        
        public function __destruct()
        {
            $mensaje = "";

            if ($this->resultado) {
                $mensaje .= "Felicidades has ganado en ";
            } else {
                $mensaje .= "Que lastima, has perdido en ";
            }
            
            $mensaje .= $this->intentos;
            $mensaje .= " intentos.";
            
            echo $mensaje;
        }
    }
    
    $loteria = new Loteria(10, 10);
    $loteria->sortear();