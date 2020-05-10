<?php

namespace App\Http\Middleware;

use Closure;
use App\Tools\InitApp;
use App\Tools\IConfigVarAuto;

class TestInitApp
{
    /**
     * @var \App\Tools\InitApp
     */
    private $initApp ;
    /**
     * @var IConfigVarAuto
     */
    private $config;

    /**
     * @param \App\Tools\InitApp $initApp
     * @param \App\Tools\IConfigVarAuto $config
     */
    public function __construct(InitApp $initApp, IConfigVarAuto $config){
        $this->initApp = $initApp;
        $this->config = $config;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $intiApp = $this->config->getParem('initApp');
        if($initApp === 0){
            $initApp();
        }
        return $next($request);
    }
}
