<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->uuid('id_wiadomosci');
            $table->primary('id_wiadomosci');
            $table->uuid('id_zleceniodawcy');
            $table->uuid('id_zleceniobiorcy');
            $table->uuid('id_zlecenia');
            $table->dateTime('data_dodania');
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
        Schema::dropIfExists('messages');
    }
}
