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
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('mandatory_id');
            $table->uuid('order_id');
            $table->boolean('canceled');
            $table->boolean('principal_aproved');
            $table->boolean('rejected');
            $table->text('request_text');
            $table->float('starting_price', 8, 2)->unsigned();
            $table->timestamps();
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
