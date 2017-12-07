<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('id_autora');
            $table->uuid('id_katagorii');
            $table->uuid('id_lokalizacji');
            $table->dateTime('data_startu');
            $table->dateTime('data_konca');
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->dateTime('data_archiwizacji');
            $table->boolean('czy_zarchiwizowno')->default(false);
            $table->boolean('czy_usunieto')->default(false);
            $table->string('nazwa', 50);
            $table->text('opis');
            $table->float('cena_wyjsciowa', 8, 2)->default(0)->unsigned();
            $table->boolean('czy_polecone')->default(false);
            $table->string('nr_telefonu');
            $table->string('email');
            $table->integer('licznik_wyswietlen')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
