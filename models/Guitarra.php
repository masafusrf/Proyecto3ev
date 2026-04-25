<?php

    class Guitarra extends Instrumento{
        private $numeroCuerdas;
        private $esElectrica;

        public function __construct($marca, $modelo, $precioBase, $numeroCuerdas, $esElectrica, $id=0){
            parent::__construct($marca, $modelo, $precioBase, $id);
            $this->numeroCuerdas=$numeroCuerdas;
            $this->esElectrica=$esElectrica;
        }

        public function getNumeroCuerdas(){
            return $this->numeroCuerdas;
        }

        public function getEsElectrica(){
            return $this->esElectrica;
        }

        public function setNumeroCuerdas($numeroCuerdas):self{
            $this->numeroCuerdas=$numeroCuerdas;
            return $this;
        }

        public function setEsElectrica($esElectrica):self{
            $this->esElectrica=$esElectrica;
            return $this;
        }

        public function calcularPrecioFinal(){
            $precio=parent::calcularPrecioFinal();
            if ($this->esElectrica){
                $precio += 50;
            }
            return $precio;
        }
    }

?>