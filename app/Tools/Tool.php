<?php
namespace App\Tools;


abstract class Tool implements Middlewares\IMiddleware {

    public function __construct(){

    }
    /**
     * permet de demarer l'execution
     * @var Array|string
     */

    abstract public function __invoke($data);


    /**
     * permet de demarer l'execution
     * @var Array|string
     */

    abstract public function _exec($data);

}