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

        public function agregar() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $tipo = $_POST['tipo'];
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $precioBase = $_POST['precioBase'];
                if ($_POST['tipo']=="Piano"){
                    $numeroTeclas = $_POST['numeroTeclas']; 
                    $tipoPiano = $_POST['tipoPiano']; 
                    $instrumento = new Piano ($marca, $modelo, $precioBase, $numeroTeclas, $tipoPiano);
                }else{
                    $numeroCuerdas = $_POST['numeroCuerdas'];
                    $esElectrica = $_POST['esElectrica'];
                    $instrumento = new Guitarra ($marca, $modelo, $precioBase, $numeroCuerdas, $esElectrica);
                }
                $this->gestor->agregar($instrumento);

                header("Location: index.php");
                exit;
            }

            include "views/crear.php";
        }

        public function editar() {
            $id = $_GET['id'] ?? null;
            $instrumento=($this->gestor->buscar($id));
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $instrumento->setMarca($_POST['marca']);
                $instrumento->setModelo($_POST['modelo']);
                $instrumento->setPrecioBase($_POST['precioBase']);
                if ($instrumento instanceof Piano){
                    $instrumento->setNumeroTeclas($_POST['numeroTeclas']);
                    $instrumento->setTipoPiano($_POST['tipoPiano']);
                }else{
                    $instrumento->setNumeroCuerdas($_POST['numeroCuerdas']);
                    $instrumento->setEsElectrica($_POST['esElectrica']);
                }
                
                $this->gestor->actualizar($instrumento);
                header("Location: index.php");
                exit;
            }

            include "views/editar.php";
        }
    }

?>