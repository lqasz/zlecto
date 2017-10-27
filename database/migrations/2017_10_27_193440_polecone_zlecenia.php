<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PoleconeZlecenia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polecone_zlecenia', function (Blueprint $table) {
            $table->uuid('id_zlecenia');
            $table->primary('id_zlecenia');
            $table->dateTime('data_startu');
            $table->dateTime('data_konca');
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
        Schema::dropIfExists('polecone_zlecenia');
    }
}
