<?php

    class UsuarioController{

        private $gestor;

        public function __construct($gestor){
            $this->gestor=$gestor;
        }

        public function alta(){
            if ($_SERVER['REQUEST_METHOD']=== 'POST') {
                $email=$_POST['email'];
                $passwordPlana=$_POST['password'];

                $passwordHash = password_hash($passwordPlana, PASSWORD_DEFAULT);

                $nuevoUsuario = new Usuario($email, $passwordHash);

                $this->gestor->registrarUsuario($nuevoUsuario);

                header("Location: index.php?accion=login");
                exit;
            }

            include "views/alta.php";
        }

        public function login(){
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email= $_POST['email'];
                $passwordPlana=$_POST['password'];
                $recordar= isset($_POST['recordarme']);

                $usuario=$this->gestor->buscarUsuarioPorEmail($email);

                if ($usuario && password_verify($passwordPlana, $usuario->getPassword())) {
                    $_SESSION['usuario_id']=$usuario->getId();
                    $_SESSION['usuarioEmail']=$usuario->getEmail();
                    $_SESSION['tema']=$usuario->getTema();

                    if ($recordar) {
                        $token=base64_encode($usuario->getEmail());

                        setCookie(
                            "usuario_login",
                            $token,
                            [
                                'expires' => time() + (86400 * 30),
                                'path' => '/',
                                'httponly'=> true,
                                'samesite'=>'Strict'
                            ]
                        );
                    }

                    header("Location:index.php?accion=listar");
                    exit;
                }else{
                    $error="Credenciales incorrectas";
                }
            }

            include "views/login.php";
        }

        public function logout(){
            $_SESSION=[];
            session_destroy();

            if (isset($_COOKIE['usuario_login'])) {
                setcookie('usuario_login', '', time() - 3600000, '/');
            }

            header("Location: index.php?accion=login");
            exit;
        }

        public function cambiarTema() {
            if (!isset($_SESSION['usuario_id'])) {
                header('Location: index.php?accion=login');
                exit;
            }

            $temasValidos = ['claro', 'oscuro'];
            $nuevo = $_POST['tema'] ?? 'claro';
            if (!in_array($nuevo, $temasValidos)) $nuevo= 'claro';

            $this->gestor->actualizarTema($_SESSION['usuario_id'], $nuevo);
            $_SESSION['tema'] = $nuevo;

            header('Location: index.php');
            exit;
        }
    }

?>