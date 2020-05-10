<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Intrant extends Model
{
    //
    /**
     * permet de retourner les fournisseurs qui peut fournir l'intrant dans un secteur ou commune donnée
     * @param int $sectOuComId l'identifiant du secteur ou commune 
     * @return array 
     */
    public function getFssIntrantBySectOuCom(int $sectOuComId)
    {
        $fsss = $this->fss_intrants;
        //dd($fsss->all()[0]);
        $fss_fiter =    array_filter($fsss->all(), function ($fss) use ($sectOuComId)
                        {
                            $vars = $fss->secteur_ou_communes->all();

                            //var_dump(count($vars));
                            foreach ($vars as $val) {;
                                if($val->id == $sectOuComId){
                                    return true;
                                }

                            }
                            return false;
                        });
        //dd(count($fss_fiter));
        return $fss_fiter;
    }

    /**
     * permet de faire abstration de la relation entre l'intrant et le fournisseur
     * @return 
     */
    public function fss_intrants()
    {
        return $this->belongsToMany(Fss_intrant::class);
    }
}
