<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpiniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinie', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->boolean('czy_zmodyfikowano')->default(false);
            $table->uuid('autor');
            $table->boolean('czy_polecasz')->default(false);
            $table->boolean('archiwizacja')->default(false);
            $table->string('komentarz', 80);
            $table->integer('ocena_ceny')->default(0);
            $table->integer('ocena_atmosfery')->default(0);
            $table->integer('ocena_czasu_realizacji')->default(0);
            $table->integer('ocena_lokalizacji')->default(0);
            $table->integer('ocena_wykonania')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('opinie');
    }
}
