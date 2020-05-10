<?php
namespace App\Tools;
use App\Tools\Middlewares\Request;
use App\Tools\Middlewares\IDelegate;

/**
 * 
 */
class Tools extends Tool {

    /**
     * @var Tool l'instance de l'outil
     */
    private static $instance = null;
    public function __construct($app){   
        parent::__construct();
        $this->app = $app;
        Tools::$instance = $this;
        ##construct
    }
    /**
     * alias _exec
     */
    public static function exec($app)
    {
        return self::instance()->_exec($app);
    }
    /**
     * permet de retournner l'instance de la classe
     */
    public static function instance($app){
        if(is_null(self::$instance)){
            self::$instance = new Tools($app);
        }
        return self::$instance;
    }
    /**
     * permet de retourner l'outil qui permet de fournir les identifiant des fournisseur des intrants
     * @return getFactModels
     */
    public function getFssIdFss(){
        return FssIdFss::exec($this);
    }
    /**
     * permet de retourner le fabrique des models
     * @return FactModel
     */
    public function getFactModels()
    {
        return FabModels::instance();
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
        throw new \Error("je ne support pas cette methode");
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