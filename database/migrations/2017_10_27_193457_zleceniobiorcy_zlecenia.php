<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZleceniobiorcyZlecenia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zleceniobiorcy_zlecenia', function (Blueprint $table) {
            $table->uuid('id_zgloszenia');
            $table->primary('id_zgloszenia');
            $table->uuid('id_zleceniobiorcy');
            $table->uuid('id_zlecenia');
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->boolean('czy_anulowano')->default(false);
            $table->boolean('czy_zleceniodawca_zatwierdza')->default(false);
            $table->boolean('czy_odrzucono')->default(false);
            $table->text('tresc_zgloszenia');
            $table->float('cena_wywolawcza', 8, 2)->default(0)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zleceniobiorcy_zlecenia');
    }
}
