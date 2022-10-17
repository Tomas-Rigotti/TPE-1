<?php

class LibrosModel {

    function conectarDB(){
        $db = new PDO('mysql:host=localhost;'.'dbname=tpe;charset=utf8', 'root', '');
        return $db;
    }
    
    function obtenerLibros(){ 
        $db = $this->conectarDB();
        $consulta = $db->prepare("SELECT libros.*, autores.nombre as autor FROM libros INNER JOIN autores ON libros.id_autores_fk = autores.id_autores");
        $consulta->execute();
        $libros = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $libros;

    }

    function obtenerLibrosporID($id){ 
        $db = $this->conectarDB();
        $consulta = $db->prepare("SELECT libros.*, autores.nombre as autor, autores.id_autores as id_autor FROM libros INNER JOIN autores ON libros.id_autores_fk = autores.id_autores WHERE libros.id_libros ='$id'");
        $consulta->execute();
        $librosporID = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $librosporID;
    }

    function obtenerLibrosFormEditar($id){
        $db = $this->conectarDB();
        $consulta = $db->prepare("SELECT * FROM `libros` WHERE id_libros='$id'");
        $consulta->execute();
        $librosporID = $consulta->fetch(PDO::FETCH_OBJ);
        return $librosporID;
    }

    function obtenerLibrosporAutor($id){
        $db = $this->conectarDB();
        $consulta = $db->prepare("SELECT libros.*, autores.nombre as autor  FROM libros INNER JOIN autores ON libros.id_autores_fk = autores.id_autores WHERE id_autores_fk='$id'");
        $consulta->execute();
        $librosPorAutor = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $librosPorAutor;
    }   

    function agregarLibro($titulo, $fecha_pub, $genero, $cantPaginas, $autor){
        $db = $this->conectarDB();
        $consulta = $db->prepare("INSERT INTO libros (titulo, fecha_pub, genero, cantidad_pag, id_autores_fk) VALUES (?, ?, ?, ?, ?)");
        $consulta->execute([$titulo, $fecha_pub, $genero, $cantPaginas, $autor]);
    }

    function borrarLibro($id){
        $db = $this->conectarDB();
        $consulta = $db->prepare("DELETE FROM libros WHERE id_libros = ?"); 
        $consulta->execute([$id]);
    }

    function editarLibro($titulo, $fecha_pub, $genero, $cantidad_pag, $autor, $id){
        $db = $this->conectarDB();
        $consulta = $db->prepare("UPDATE libros SET titulo=?, fecha_pub=?, genero=?, cantidad_pag=?, id_autores_fk=? WHERE id_libros=?");
        $consulta->execute([$titulo, $fecha_pub, $genero, $cantidad_pag, $autor, $id]);
    }

    
}