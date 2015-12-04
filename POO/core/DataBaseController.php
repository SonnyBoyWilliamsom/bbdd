<?php

class DataBaseController {
    private $host, $user, $password, $database;
    private $link; //Creamos esta propiedad para tener acceso a ella. Si se tuviera como variable de la clase, no todas las funciones de ésta tienen acceso a dicha variable.
    function __construct($host, $user, $password, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    private function connectDB(){
        $this->link = mysqli_connect($this->host, $this->user, $this->password , $this->database);
    }
    private function disconnectDB(){
        mysqli_close($this->link);
    }
    function executeQuery($sql){
        $this->connectDB();
        $result = mysqli_query($this->link, $sql);
        $this->disconnectDB();
        return $result;
    }
    function executeSelectQuery($sql){}
}
