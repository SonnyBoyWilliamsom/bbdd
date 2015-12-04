<?php

class Contacto { //Clase encapsulada
    private $id, $nombre, $apellidos, $telefono, $email, $foto, $id_catagoria;
    
    function __construct($id, $nombre, $apellidos, $telefono, $email, $foto, $id_catagoria) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->foto = $foto;
        $this->id_catagoria = $id_catagoria;
    }
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getId_catagoria() {
        return $this->id_catagoria;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function setId_catagoria($id_catagoria) {
        $this->id_catagoria = $id_catagoria;
    }



}
