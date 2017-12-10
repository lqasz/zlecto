<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserRegistration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_registration', function (Blueprint $table) {
            $table->uuid('id_uzytkownika');
            $table->primary('id_uzytkownika');
            $table->string('token');
            $table->dateTime('data_dodania');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_registration');
    }
}
