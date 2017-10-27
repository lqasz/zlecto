<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UlubioneZlecenia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulubione_zlecenia', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('id_uzytkownika');
            $table->uuid('id_zlecenia');
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->boolean('czy_anulowano')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ulubione_zlecenia');
    }
}
