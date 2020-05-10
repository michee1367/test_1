<?php
namespace App\Tools\Middlewares;
/**
 * permet d'etablir le contrat pour des delegués des middleware de l'application
 */
interface IDelegate {

    /**
     * permet de declencher l'execution d'un delegué
     * @param Request $request 
     * @return Response
     */
    public function process($request);
}