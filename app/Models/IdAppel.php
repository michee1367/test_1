<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IdAppel extends Model
{
    //
    /**
     * permel de retourner le nom  du type d'appel
     * @return string
     */
    public function nom_type()
    {
        //dd($this->type_appel);
        if($this->type_appel==null){
            throw new \Error("je ne support pas cette methode");
        }
        return $this->type_appel->nom_type_appel;
    }

    /**
     * permet de faire abstraction de la relation id_appel et type appel
     */
    public function type_appel()
    {
        return $this->belongsTo(TypeAppel::class);
    }
}
