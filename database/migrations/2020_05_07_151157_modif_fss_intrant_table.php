<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifFssIntrantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fss_intrants', function (Blueprint $table) {
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
        Schema::table('fss_intrants', function (Blueprint $table) {
            $table->dropColumn('secteur_ou_commune_id');
        });
    }
}
