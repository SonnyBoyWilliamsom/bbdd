<?php
include './DataBaseController.php';
class ContactoContoller {
    private $db;
    function __construct(){
        include 'inc/connect.php';//Los parametros: host, user, password, database los obtenemos de documento connect
        $this->db = new DataBaseController($host, $user, $password, $db_name);
    }
    public function insertContacto(){
        $this->db->executeQuery("insert into contactos (nombre, apellidos, telefono)");
    }
    public function deleteContacto(){}
    public function updateContacto(){}
    public function selectContacto(){}
    public function selectContactos(){}
    
}
