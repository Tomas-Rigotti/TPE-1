<?php

require_once './app/views/log.view.php';
require_once './app/models/log.model.php';

class LogController {
    private $view;
    private $model;
    
    public function __construct() {
        $this->model = new UsuarioModel();
        $this->view = new LogView();
    }

    public function mostrarLogin() {
        $this->view->mostrarLogin();
    }

    public function validarUsuario() {
        
        $email = $_POST['email'];
        $clave = $_POST['clave'];

        $usuario = $this->model->conseguirUsuarioPorEmail($email);

        if ($usuario && password_verify($clave, $usuario->clave)) {
            session_start();
            $_SESSION['USER_ID'] = $usuario->id_usuarios;
            $_SESSION['USER_EMAIL'] = $usuario->email;
            $_SESSION['IS_LOGGED'] = true;


            header("Location: " . BASE_URL);
        } else {
            
           $this->view->mostrarLogin("El usuario o la contraseña no existe.");
        } 
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL);
    }
}