<?php

    class GestorPDO extends Connection{

        public function __construct(){
            parent::__construct();
        }

        public function listar(){
            $consulta= "SELECT * FROM instrumento";
            $rtdo=$this->conn->query($consulta);
            $arrayInstrumentos=[];

            while ($value = $rtdo->fetch(PDO::FETCH_ASSOC)){
                if ($value['tipo']=="Piano"){
                    $instrumento = new Piano ($value['marca'], $value['modelo'], $value['precioBase'], $value['numeroTeclas'], $value['tipoPiano'], $value['id']);
                }else{
                    $instrumento = new Guitarra ($value['marca'], $value['modelo'], $value['precioBase'], $value['numeroCuerdas'], $value['esElectrica'], $value['id']);
                }
                
                $arrayInstrumentos[]=$instrumento;
            }
            return $arrayInstrumentos;
    
        }

        public function buscar($id){
            $sql = 'SELECT * FROM instrumento WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            if ($value = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($value['tipo'] == "Piano") {
                    return new Piano($value['marca'], $value['modelo'], $value['precioBase'], $value['numeroTeclas'], $value['tipoPiano'], $value['id']);
                } else {
                    return new Guitarra($value['marca'], $value['modelo'], $value['precioBase'], $value['numeroCuerdas'], $value['esElectrica'], $value['id']);
                }
            }

            return null;
        }
    }

?>