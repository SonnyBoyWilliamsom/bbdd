<?php
/*Las clases las podemos dividir en clases modélicas, que se definen una por tabla en la base de datos; y funcionales, aquellas que son otorgadas por el controlador, que están compuestas únicamente por funciones*/
class Noticia {
    //Los atributos pueden ser públicos o privados
    //Clase encapsulada: Todos los atributos privados y los métodos públicos
    
    private $id; //Se puede decalrar en línea: private $id, $titulo, $texto
    private $titulo;
    private $texto;
    
    function __construct($id, $titulo, $texto) { //El constructor es una función que se ejecuta automáticamente al instanciar a un objeto
        $this->id = $id;
        $this->titulo = $titulo;
        $this->texto = $texto;
    }
    
    public function getId(){
        return $this->id;
    }
    public function getTitulo(){
        return  $this->titulo ;
    }
    public function getTexto(){
        return $this->texto;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setTitulo($titulo){
        $this->id = $titulo;
    }
    public function setTexto($texto){
        $this->id = $texto;
    }
    
}
