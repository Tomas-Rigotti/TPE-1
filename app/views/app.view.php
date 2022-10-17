<?php

require_once('./libs/smarty-4.2.1/libs/Smarty.class.php');

class LibrosView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }

    function mostrarHome($libros, $autores){
        $this->smarty->assign('libros', $libros);
        $this->smarty->assign('autores', $autores);
        $this->smarty->display('home.tpl');
    } 

    function mostrarDetalleLibros($librosporID){ //preguntar si aca hay que poner el autor tambien
        $this->smarty->assign('librosporID', $librosporID);
        $this->smarty->display('detalleLibros.tpl');        
    }

    function mostrarDetalleAutores($librosPorAutor){
        $this->smarty->assign('librosPorAutor', $librosPorAutor);
        $this->smarty->display('detalleAutores.tpl');
        
        
    }

    function formEditarLibro($libros, $autores){
        $this->smarty->assign('libros', $libros);
        $this->smarty->assign('autores', $autores);
        $this->smarty->display('editarLibro.tpl');
    }



}
    
class AutoresView {

    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty();
    }

    function mostrarAutores($autores){
        $this->smarty->assign('autores', $autores);
        $this->smarty->display('autores.tpl');
    }

    function formEditarAutor($autor){
        $this->smarty->assign('autor', $autor);
        $this->smarty->display('editarAutor.tpl');
        
    }

    /*function paginaprueba($nombre,$lugar_nac,$fecha_nac,$id){
    $this->smarty->assign('nombre', $nombre);
    $this->smarty->assign('lugar_nac', $lugar_nac);
    $this->smarty->assign('fecha_nac', $fecha_nac);
    $this->smarty->assign('id', $id);
    $this->smarty->display('paginaprueba.tpl');
    
}*/


}