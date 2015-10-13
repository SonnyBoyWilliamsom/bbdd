<?php

class Categoria {
    private $id, $categoria;
    function __construct($id, $categoria) {
        $this->id = $id;
        $this->categoria = $categoria;
    }
    public function getId() {
        return $this->id;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }


}
