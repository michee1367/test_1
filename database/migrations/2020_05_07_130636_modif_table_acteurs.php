<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifTableActeurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('acteurs', function (Blueprint $table) {
            $table->integer('secteur_ou_commune_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('acteurs', function (Blueprint $table) {
            $table->dropColumn('secteur_ou_commune_id');
        });
    }
}
