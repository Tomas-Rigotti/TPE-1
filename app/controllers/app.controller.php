<?php 
include_once './app/views/app.view.php';
include_once './app/models/libros.model.php';
include_once './app/models/autores.model.php';
require_once './app/helpers/log.helper.php';

class LibrosController {
    private $model;
    private $view;

    

    function __construct(){
        $this->model = new LibrosModel();
        $this->view = new LibrosView();
    }

    function mostrarHome(){
        session_start();
        $libros = $this->model->obtenerLibros(); 

        $modelAutores = new AutoresModel();
        $autores = $modelAutores->obtenerAutores();
        $this->view->mostrarHome($libros, $autores);
    }

    function mostrarDetalleLibros($id){
        session_start();
        $libros = $this->model->obtenerLibrosporID($id);
        $this->view->mostrarDetalleLibros($libros);
    }

    function mostrarDetalleAutores($id){
        session_start();
        $autoresporID = $this->model->obtenerLibrosporAutor($id);
        $this->view->mostrarDetalleAutores($autoresporID);
    }

    

    function agregarLibro(){
        $logHelper = new LogHelper();
        $logHelper->verificarLogueado();

        if (isset($_POST['inputAutor']) && $_POST ['inputAutor'] == 'vacio') {
            header("Location: " . BASE_URL . "home");
        } else {
            $titulo = $_POST['titulo'];
            $fecha_pub = $_POST['fecha_pub'];
            $genero = $_POST['genero'];
            $cantPaginas = $_POST['cantPaginas'];
            $autor = (int)$_POST['inputAutor'];
            $id = $this->model->agregarLibro($titulo, $fecha_pub, $genero, $cantPaginas, $autor);
            header("Location: " . BASE_URL);
        }

    }

    function borrarLibro($id){
        $logHelper = new LogHelper();
        $logHelper->verificarLogueado();

        $this->model->borrarLibro($id);
        header("Location: " . BASE_URL);
    }

    function formEditarLibro($id){
        $logHelper = new LogHelper();
        $logHelper->verificarLogueado();

        $libros = $this->model->obtenerLibrosFormEditar($id); 

        $modelAutores = new AutoresModel();
        $autores = $modelAutores->obtenerAutores();

        $this->view->formEditarLibro($libros, $autores);
    }
    
    function editarLibro($id){
        $logHelper = new LogHelper();
        $logHelper->verificarLogueado();

        if (isset($_POST['inputAutor']) && $_POST ['inputAutor'] == 'vacio') {
            header("Location: " . BASE_URL . "form-editar-libro/$id");
        } else {
            $titulo = $_POST['titulo'];
            $fecha_pub = $_POST['fecha_pub'];
            $genero = $_POST['genero'];
            $cantidad_pag = $_POST['cantidad_pag'];
            $autor = $_POST['inputAutor'];

            $this->model->editarLibro($titulo, $fecha_pub, $genero, $cantidad_pag, $autor, $id);
            
            header("Location: " . BASE_URL);
        }
    }
}

class AutoresController {
    
    private $model;
    private $view;

    function __construct(){
        $this->model = new AutoresModel();
        $this->view = new AutoresView();
    }

    function mostrarAutores(){
        session_start();
        $autores = $this->model->obtenerAutores(); 
        $this->view->mostrarAutores($autores);
     }

     

    function agregarAutor(){
        $logHelper = new LogHelper();
        $logHelper->verificarLogueado();

        $nombre = $_POST['nombre'];
        $lugar_nac = $_POST['lugar_nac'];
        $fecha_nac = $_POST['fecha_nac'];

        $id = $this->model->agregarAutor($nombre, $lugar_nac, $fecha_nac);

        header("Location: " . BASE_URL . "autores"); 
    }

    function borrarAutor($id) {
        $logHelper = new LogHelper();
        $logHelper->verificarLogueado();

        $this->model->borrarAutor($id);
        header("Location: " . BASE_URL . "autores");
    }

    function formEditarAutor($id){
        $logHelper = new LogHelper();
        $logHelper->verificarLogueado();

        $autor = $this->model->obtenerAutorPorID($id);
        $this->view->formEditarAutor($autor);
        
    }

    function editarAutor($id){

        $logHelper = new LogHelper();
        $logHelper->verificarLogueado();
        
        $nombre = $_POST['nombre'];
        $lugar_nac = $_POST['lugar_nac'];
        $fecha_nac = $_POST['fecha_nac'];
       
        $this->model->editarAutor($nombre, $lugar_nac, $fecha_nac, $id);
        
        header("Location: " . BASE_URL . "autores");
    }
}



