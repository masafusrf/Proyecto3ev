<?php
    require_once "autoload.php";
    session_start();
    
    $gestor = new GestorPDO();
    $controller = new InstrumentoController($gestor);
    $accion = $_GET['accion'] ?? 'listar';

    switch ($accion) { 
        case 'listar':
            $controller->listar();
            break;
        case 'crear':
            $controller->agregar();
            break;
        case 'editar':
            $controller->editar();
            break;
        case 'modificar':
            $controller->modificar();
            break;
        case 'eliminar':
            $controller->eliminar();
            break;
    }
?>