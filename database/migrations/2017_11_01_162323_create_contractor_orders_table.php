<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_orders', function (Blueprint $table) {
            $table->uuid('id_zgloszenia');
            $table->primary('id_zgloszenia');
            $table->uuid('id_zleceniobiorcy');
            $table->uuid('id_zlecenia');
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->boolean('czy_anulowano');
            $table->boolean('czy_zleceniodawca_zatwierdza');
            $table->boolean('czy_odrzucono');
            $table->text('tresc_zgloszenia');
            $table->float('cena_wywolawcza', 8, 2)->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contractor_orders');
    }
}
