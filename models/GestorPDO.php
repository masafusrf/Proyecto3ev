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

        public function agregar($instrumento){
            try{
                if ($instrumento instanceof Piano) {
                    $sql= "INSERT INTO instrumento (tipo, marca, modelo, precioBase, numeroTeclas, tipoPiano) VALUES (:tipo, :marca, :modelo, :precioBase, :numeroTeclas, :tipoPiano)";
                    $stmt= $this->conn->prepare($sql);
                    $stmt->bindValue(':tipo', "Piano");
                    $stmt->bindValue(':marca', $instrumento->getMarca());
                    $stmt->bindValue(':modelo', $instrumento->getModelo());
                    $stmt->bindValue(':precioBase', $instrumento->getPrecioBase());
                    $stmt->bindValue(':numeroTeclas', $instrumento->getNumeroTeclas());
                    $stmt->bindValue(':tipoPiano', $instrumento->getTipoPiano());
                } else{
                    $sql= "INSERT INTO instrumento (tipo, marca, modelo, precioBase, numeroCuerdas, esElectrica) VALUES (:tipo, :marca, :modelo, :precioBase, :numeroCuerdas, :esElectrica)";
                    $stmt= $this->conn->prepare($sql);
                    $stmt->bindValue(':tipo', "Guitarra");
                    $stmt->bindValue(':marca', $instrumento->getMarca());
                    $stmt->bindValue(':modelo', $instrumento->getModelo());
                    $stmt->bindValue(':precioBase', $instrumento->getPrecioBase());
                    $stmt->bindValue(':numeroCuerdas', $instrumento->getNumeroCuerdas());
                    $stmt->bindValue(':esElectrica', $instrumento->getEsElectrica());
                }

                return $stmt->execute();

            } catch(PDOException $e){
                return false;
            }
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

        public function actualizar($instrumento){
            try{
                if ($instrumento instanceof Piano) {
                    $sql="UPDATE instrumento SET tipo=:tipo, marca=:marca, modelo=:modelo, precioBase=:precioBase, numeroTeclas=:numeroTeclas, tipoPiano=:tipoPiano WHERE id= :id";
                    $stmt= $this->conn->prepare($sql);
                    $stmt->bindValue(':id', $instrumento->getId());
                    $stmt->bindValue(':tipo', "Piano");
                    $stmt->bindValue(':marca', $instrumento->getMarca());
                    $stmt->bindValue(':modelo', $instrumento->getModelo());
                    $stmt->bindValue(':precioBase', $instrumento->getPrecioBase());
                    $stmt->bindValue(':numeroTeclas', $instrumento->getNumeroTeclas());
                    $stmt->bindValue(':tipoPiano', $instrumento->getTipoPiano());
                }else{
                    $sql="UPDATE instrumento SET tipo=:tipo, marca=:marca, modelo=:modelo, precioBase=:precioBase, numeroCuerdas=:numeroCuerdas, esElectrica=:esElectrica WHERE id = :id";
                    $stmt= $this->conn->prepare($sql);
                    $stmt->bindValue(':id', $instrumento->getId());
                    $stmt->bindValue(':tipo', "Guitarra");
                    $stmt->bindValue(':marca', $instrumento->getMarca());
                    $stmt->bindValue(':modelo', $instrumento->getModelo());
                    $stmt->bindValue(':precioBase', $instrumento->getPrecioBase());
                    $stmt->bindValue(':numeroCuerdas', $instrumento->getNumeroCuerdas());
                    $stmt->bindValue(':esElectrica', $instrumento->getEsElectrica());
                }

                return $stmt->execute();

            }catch(PDOException $e){
                die("Error de la base de datos al actualizar: " . $e->getMessage());
            }

        }
    }

?>