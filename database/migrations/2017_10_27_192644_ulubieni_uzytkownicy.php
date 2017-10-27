<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UlubieniUzytkownicy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ulubieni_uzytkownicy', function (Blueprint $table) {
            $table->uuid('id_polubionego');
            $table->uuid('id_polubiajacego');
            $table->primary(['id_polubionego', 'id_polubiajacego']);
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->boolean('czy_usunieto')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ulubieni_uzytkownicy');
    }
}
