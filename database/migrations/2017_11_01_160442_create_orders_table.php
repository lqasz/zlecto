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
            $table->uuid('user_id');
            $table->uuid('category_id');
            $table->uuid('location_id');
            $table->dateTime('date_start');
            $table->dateTime('date_end');
            $table->dateTime('date_of_archiving');
            $table->boolean('archived')->default(false);
            $table->boolean('deleted')->default(false);
            $table->string('name', 50);
            $table->text('description');
            $table->float('starting_price', 8, 2)->unsigned();
            $table->boolean('recomended')->default(false);
            $table->string('phone_number');
            $table->string('email');
            $table->integer('number_of_views')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
