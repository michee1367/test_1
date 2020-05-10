<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Secteur_ou_Commune extends Model
{
    //


    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        return "secteur_ou_communes";
    }
}
