<?php

    class Usuario{
        private $id;
        private $email;
        private $password;

        public function __construct($email, $password, $id=0){
            $this->email=$email;
            $this->password=$password;
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
    }

?>