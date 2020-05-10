<?php
namespace App\Tools;
use App\Tools\Middlewares\Request;
use App\Tools\Middlewares\IDelegate;

/**
 * 
 */
class ExempleTool extends Tool {

    /**
     * @var Tool l'instance de l'outil
     */
    private static $instance = null;
    public function __construct(){   
        parent::__construct();
        ##construct
    }
    /**
     * alias _exec
     */
    public static function exec($data)
    {
        return self::instance()->_exec($data);
    }
    /**
     * permet de retournner l'instance de la classe
     */
    public static function instance(){
        if(is_null(self::$instance)){
            self::$instance = new ExempleTool();
        }
        return self::$instance;
    }
    /**
     * permet de demarer l'execution
     * @var Array|string
     */

    public function __invoke($data){
        $this->_exec($data);
    }

    /**
     * permet de demarer l'execution
     * @var Array|string
     */

    public function _exec($data){
        //throw Error("je ne support pas cette methode");
        ##code
    }

    /**
     * permet de declencher l'execution d'un middleware
     * @param Request $request la requette
     * @param IDelegate $delegate 
     * @return Void
     */
    public function process($request, $delegate){
        throw new \Error("je ne support pas cette methode");
        
    }


}