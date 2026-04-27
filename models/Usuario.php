<?php

    class Usuario{
        private $id;
        private $email;
        private $password;
        private $tema;

        public function __construct($email, $password, $tema='claro', $id=0){
            $this->email=$email;
            $this->password=$password;
            $this->tema=$tema;
            $this->id=$id;
        }

        public function getId(){
            return $this->id;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getTema(){
            return $this->tema;
        }

        public function setId(): self{
            $this->id = $id;
            return $this;
        }

        public function setEmail(): self{
            $this->email=$email;
            return $this;
        }

        public function setPassword(): self{
            $this->password=$password;
            return $this;
        }

        public function setTema(): self{
            $this->tema=$tema;
            return $this;
        }
    }

?>