<?php
require_once './app/controllers/app.controller.php';
require_once './app/controllers/log.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}


$params = explode('/', $action); 

switch ($params[0]) {
    case 'home':
        $controller = new LibrosController();
        $controller->mostrarHome();
        break;
    case 'autores':
        $controller = new AutoresController();
        $controller->mostrarAutores();
        break;
    case 'detalle-libros': 
        $id = $params[1];
        $controller = new LibrosController();
        $controller->mostrarDetalleLibros($id);
        break; 
    case 'detalle-autores':
        $id = $params[1];
        $controller = new LibrosController();
        $controller->mostrarDetalleAutores($id);
        break; 
    case 'agregar-autor':
        $controller = new AutoresController();
        $controller->agregarAutor();
        break;
    case 'borrar-autor':
        $id = $params[1];
        $controller = new AutoresController();
        $controller->borrarAutor($id);
        break;
    case 'form-editar-autor':
        $id = $params[1];
        $controller = new AutoresController();
        $controller->formEditarAutor($id);
        break;
    case 'editar-autor':
        $id = $params[1];
        $controller = new AutoresController();
        $controller->editarAutor($id);
        break;
    case 'form-editar-libro':
        $id = $params[1];
        $controller = new LibrosController();
        $controller->formEditarLibro($id);
        break;
    case 'editar-libro':
        $id = $params[1];
        $controller = new LibrosController();
        $controller->editarLibro($id);
        break;
    case 'agregar-libro':
        $controller = new LibrosController();
        $controller->agregarLibro();
        break;
    case 'borrar-libro':
        $id = $params[1];
        $controller = new LibrosController();
        $controller->borrarLibro($id);
        break;
    case 'login':
        $logController = new LogController();
        $logController->mostrarLogin();
        break;
    case 'validar':
        $logController = new LogController();
        $logController->validarUsuario();
        break;
    case 'logout':
        $logController = new LogController();
        $logController->logout();
        break;    
    default:
        $controller = new LibrosController();
        $controller->mostrarHome();
        break;
}