<?php
namespace App\Tools\Middlewares;

class Dispatcher implements IDelegate {
    /**
     * @var Array
     */
    private $middlewares =[];

    /**
     * @var Array
     */
    private $i = 0;

    /**
     * @var Response
     */
    private $response;
    
    public function __construct(){
        $this->response = new Response();
    }

    /**
     * permet de charger un middleware
     * @param IMiddleware
     */
    public function pipe($middleware){
        $this->middlewares[] = $middleware;
        return $this;
    }


    /**
     * permet de declencher l'execution d'un delegué
     * @param Request $request 
     * @return Response
     */
    public function process($request = null){
        //dump($this->nextMiddleware()->process($request, $this));
        //dump($this->nextMiddleware());
        //dump($this->i);
        if(is_null($request)){
            $request = new Request();
        }
        $middleware = $this->nextMiddleware();
        if(!is_null($middleware)){          

            $middleware->process($request, $this);
            $this->process($request);
            
        }
        return $this->response;
        //dump($middleware);
        

    }

    /**
     * permet de retourner le middleware suivant à executer
     * @return int 
     */
    private function nextMiddleware(){
        
        if(isset($this->middlewares[$this->i])){
            return $this->middlewares[$this->i++];
        }
        return null;

    }


}