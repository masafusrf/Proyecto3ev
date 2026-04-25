<?php

    class InstrumentoController{
        
        private $gestor;

        public function __construct($gestor) {
            $this->gestor = $gestor;
        }

        public function listar() {
            $instrumentos = $this->gestor->listar();
            include "views/listar.php";
        }
    }

?>