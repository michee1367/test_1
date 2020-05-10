<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecteurOuCommuneFssIntrantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secteur_ou_commune_fss_intrants', function (Blueprint $table) {
            $table->id();
            $table->integer("secteur_ou_commune_id");
            $table->integer("fss_intrant_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('secteur_ou_commune_fss_intrants');
    }
}
