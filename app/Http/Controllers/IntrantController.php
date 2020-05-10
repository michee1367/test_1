<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Tools;

class IntrantController extends Controller
{
    //
     //
    /**
     * permet de retourner tout les intrants
     */
    public function index(Tools $tools)
    {
        $factModels = $tools->getFactModels();
        //dd($factModels('fss_intrant')::all());
        return $factModels('intrant')::all();
    }
}
