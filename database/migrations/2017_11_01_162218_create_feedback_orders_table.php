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
            $table->uuid('order_id');
            $table->uuid('opinion_id');
            $table->uuid('subject_id');
            $table->primary(['order_id', 'opinion_id', 'subject_id']);
            $table->boolean('archived');
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
        Schema::dropIfExists('feedback_orders');
    }
}
