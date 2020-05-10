<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acteur extends Model
{
    //

    /**
     * permet de faire abstraction de la relation acteur et secteur_ou_commune
     */
    public function secteur_ou_commune()
    {
        return $this->belongsTo(Secteur_ou_Commune::class, "secteur_ou_commune_id");
    }
}
