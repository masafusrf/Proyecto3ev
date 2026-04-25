<?php

    class Instrumento{
        protected $id;
        protected $marca;
        protected $modelo;
        protected $precioBase;

        public function __construct($marca, $modelo, $precioBase, $id=0){
            $this->id=$id;
            $this->marca=$marca;
            $this->modelo=$modelo;
            $this->precioBase=$precioBase;
        }

        public function getId(){
            return $this->id;
        }

        public function getMarca(){
            return $this->marca;
        }

        public function getModelo(){
            return $this->modelo;
        }

        public function getPrecioBase(){
            return $this->precioBase;
        }


        public function setId($id): self{
            $this->id=$id;
            return $this;
        }

        public function setMarca($marca): self{
            $this->marca=$marca;
            return $this;
        }

        public function setModelo($modelo): self{
            $this->modelo=$modelo;
            return $this;
        }

        public function setPrecioBase($precioBase): self{
            $this->precioBase=$precioBase;
            return $this;
        }


        public function calcularPrecioFinal(){
            return $this->precioBase * 1.21;
        }
    } 

?>