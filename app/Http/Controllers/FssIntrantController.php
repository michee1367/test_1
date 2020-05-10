<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tools\Tools;

class FssIntrantController extends Controller
{
    //
    /**
     * permet de retourner tout les fournisseurs des intrant 
     */
    public function index(Tools $tools)
    {
        $factModels = $tools->getFactModels();
        //dd($factModels('fss_intrant')::all());
        return $factModels('fss_intrant')::all();
    }
}
