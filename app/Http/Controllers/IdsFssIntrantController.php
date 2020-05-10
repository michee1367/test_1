<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tools\Tools;

class IdsFssIntrantController extends Controller
{
    //
    /**
     * permet de retourner tout les fournisseurs des intrant 
     */
    public function show(Tools $tools, $id_intrant)
    {
        $fssIdFss = $tools->getFssIdFss();
        //dd($factModels('fss_intrant')::all());
        return $fssIdFss->byDirect(1, $id_intrant);
    }
}
