<?php
namespace App\Tools;
use App\Tools\Middlewares\Request;
use App\Tools\Middlewares\IDelegate;

/**
 * 
 */
class FabModels extends Tool {
    /**
     * @var String le prefixe des classes model 
     */
    const PREFIX = "App\Models\\";

    /**
     * @var Tool l'instance de l'outil
     */
    private static $instance = null;
    public function __construct(){   
        parent::__construct();     
    }
    /**
     * permet de retournner l'instance de la classe
     */
    public static function instance(){
        if(is_null(self::$instance)){
            self::$instance = new FabModels();
        }
        return self::$instance;
    }
    /**
     * alias _exec
     */
    public static function exec(string $data)
    {
        return self::instance()->_exec($data);
    }
    /**
     * permet de demarer l'execution
     * @var Array|string
     */

    public function __invoke($data){
        return self::instance()->_exec($data);
    }

    /**
     * permet de demarer l'execution
     * @var Array|string
     */

    public function _exec($data){
        if(!is_string($data)){
            throw new Exception("je ne supporte pas encore cette alternative !!!");
        }
        $className = self::PREFIX.ucfirst($data);
        return new $className();
        //var_dump($data);
    }

    /**
     * permet de declencher l'execution d'un middleware
     * @param Request $request la requette
     * @param IDelegate $delegate 
     * @return Void
     */
    public function process($request, $delegate){

    }


}