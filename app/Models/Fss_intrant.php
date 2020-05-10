<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fss_intrant extends Model
{
    //
    /**
     * permet de faire abstraction de la relation secteur_ou_commune et secteur_ou_commune
     */
    public function secteur_ou_communes()
    {
        return $this->belongsToMany(Secteur_ou_Commune::class, "secteur_ou_commune_fss_intrants" ,"fss_intrant_id","secteur_ou_commune_id");
    }

    /**
     * permet de retourner les identifiant d'appl du fournisseur sous forme de table
     * @return array
     */
    public function getAppelToArray()
    {
        $res = [];
        $id_appels = $this->id_appels->all();
        foreach ($id_appels as $id_appel) {
            $res[$id_appel->nom_type()]=$id_appel->valeur;
        }
        //dd($res);
        return $res;
    }

    /**
     * permet faire abstraction de la relation fss_intrant et id_appel
     */
    public function id_appels()
    {
        return $this->hasMany(IdAppel::class);
    }
}
