<?php
namespace App\Tools\Middlewares;
use ArrayIterator;


//use App\Tools\Tools;
//use App\Tools\DefaultValue; 
/**
 * permet de faire abstraction du reponse des middleware de l'application
 */
class Response extends ArrayIterator {
    /**
     * permet de renvoyer un parametre de la reponse
     * @param String $key la clé du paramatre
     * @return Object
     */
    public function param($key ){
        return this[$key];
    }

    /**
     * permet de retournner un parametre de la reponse
     * @param String $key la clé du paramatre
     * @param Object $value la valeur à attribuer à la reponse
     * @return Response
     */
    public function putParam($key , $value){
        $this[$key] = $value;
        return $this;
    }
}