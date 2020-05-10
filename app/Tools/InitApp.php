<?php
namespace App\Tools;
use App\Tools\Middlewares\Request;
use App\Tools\Middlewares\IDelegate;
use App\Tools\Contracts\IManagerMail;
use App\Tools\Contracts\IConfigVarAuto;
use App\Tools\Contracts\IUser;

/**
 * 
 */
class InitApp extends Tool {

    /**
     * @var Tool l'instance de l'outil
     */
    private static $instance = null;
    public function __construct(IManagerMail $mail, IConfigVarAuto $config, IUser $user){ 

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
            self::$instance = new InitApp();
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