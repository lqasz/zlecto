<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_orders', function (Blueprint $table) {
            $table->uuid('id_zlecenia');
            $table->uuid('id_opinii');
            $table->uuid('id_podmiotu_opinii');
            $table->primary(['id_zlecenia', 'id_opinii', 'id_podmiotu_opinii']);
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->boolean('czy_zarchiwizowano');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback_orders');
    }
}
