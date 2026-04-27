<?php
    require_once "autoload.php";
    session_start();
    
    $gestor = new GestorPDO();
    $controller = new InstrumentoController($gestor);
    $usuarioController= new UsuarioController($gestor);

    $accion = $_GET['accion'] ?? 'index';


    //cookies

    if (!isset($_SESSION['usuario_id']) && isset($_COOKIE['usuario_login'])) {
        
        $emailRecuperado=base64_decode($_COOKIE['usuario_login']);

        $usuario=$gestor->buscarUsuarioPorEmail($emailRecuperado);

        if ($usuario) {
            $_SESSION['usuario_id']=$usuario->getId();
            $_SESSION['usuarioEmail']=$usuario->getEmail();
        } else{
            setcookie('usuario_login', '', time() - 3600, '/');
        }
    }


    //acciones


    switch ($accion) {
        case 'login':
            $usuarioController->login();
            break;

        case 'alta':
            $usuarioController->alta();
            break;

        case 'logout':
            $usuarioController->logout();
            break;

        case 'tema':
            $usuarioController->cambiarTema();
            break;
        //gestión instrumentos
        case 'crear':
        case 'editar':
        case 'eliminar':
            if (!isset($_SESSION['usuario_id'])) {
                header('Location: index.php?accion=login');
                exit;
            }
            //si está autenticado:
            if($accion === 'crear') $controller->agregar();
            if($accion === 'editar') $controller->editar();
            if($accion === 'eliminar') $controller->eliminar();
            break;
        default:
            $controller->listar();

    }

?>