<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opinions', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('user_id');
            $table->boolean('modified')->default(false);
            $table->boolean('archived')->default(false);
            $table->string('comment', 80);
            $table->integer('price_rate')->default(0);
            $table->integer('atmosphere_rate')->default(0);
            $table->integer('time_rate')->default(0);
            $table->integer('location_rate')->default(0);
            $table->integer('performance_rate')->default(0);
            $table->boolean('recommended')->default(false);
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
        Schema::dropIfExists('opinions');
    }
}
