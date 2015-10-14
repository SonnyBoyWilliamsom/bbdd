<?php

class Animal{
    
    private $peso = 10;
    private $color = 'gris';
    
    //Función __construct: sirve para contruir un objeto del tipo clase. Por defecto, cuando se crea un objeto (en este caso new Animal();) se le asignan unos valores iniciales(peso=10, color=gris). Si nosotros le queremos dar a ese objeto unos argumentos diferentes para inicializarlo usamos la función __construct. Una vez establecido el constructor, los argumentos de entrada son los únicos que le darán valor ya que la asignación inicial queda anulada;
    
    public function __construct($peso,$color) {
        $this->peso = $peso;
        $this->color = $color;
    }
    
    
    //Las siguientes funciones sirven como acceso los atributos de nuestra clase, y sirver para regoger valores como para asignarlos
    
    //Obtención de valores
    public function getPeso(){
        return $this->peso;
    }
    public function getColor(){
        return $this->color;
    }
    
    //Asignación de valores
    public function setPeso($peso){
        $this->peso = $peso;
    }
    public function setColor($color){
        $this->color = $color;
    }
    
    public function cazar(Animal $presa) {//El argumento de esta funcion es un objeto y no un valor cadena o entreo como en las funciones anteriores
        $this->peso = $this->peso + $presa->peso;
        
        unset($presa);
        
    }
    
    public function checkAnimal(Animal $peligroExtincion){
        if(isset($peligroExtincion)){
            return true;
        }else{
            return false;
        }
    }
}
