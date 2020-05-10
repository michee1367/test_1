<?php
namespace App\Tools\Middlewares;
/**
 * permet d'etablir le contrat des middleware de l'application
 */
interface IMiddleware {

    /**
     * permet de declencher l'execution d'un middleware
     * @param Request $request la requette
     * @param IDelegate $delegate 
     * @return Void
     */
    public function process($request, $delegate);
}