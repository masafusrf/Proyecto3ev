<?php

    class Piano extends Instrumento{
        private $numeroTeclas;
        private $tipoPiano;

        public function __construct($marca, $modelo, $precioBase, $numeroTeclas, $tipoPiano, $id=0){
            parent::__construct($marca, $modelo, $precioBase, $id);
            $this->numeroTeclas= $numeroTeclas;
            $this->tipoPiano= $tipoPiano;
        }

        public function getNumeroTeclas(){
            return $this->numeroTeclas;
        }

        public function getTipoPiano(){
            return $this->tipoPiano;
        }

        public function setNumeroTeclas($numeroTeclas):self{
            $this->numeroTeclas=$numeroTeclas;
            return $this;
        }

        public function setTipoPiano($tipoPiano):self{
            $this->tipoPiano=$tipoPiano;
            return $this;
        }

        public function calcularPrecioFinal(){
            $precio=parent::calcularPrecioFinal();
            if (strtolower($this->tipoPiano) === 'cola') {
                $precio *= 1.15; 
            }
            return $precio;
        }

    }

?>