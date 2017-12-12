<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('location_id')->nullable(true);
            $table->uuid('wallet_id');
            $table->uuid('avatar_id')->nullable(true);
            $table->dateTime('changed_password_date')->nullable(true);
            $table->dateTime('last_login_date')->nullable(true);
            $table->boolean('deleted')->default(false);
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone_number');
            $table->enum('status', ['active', 'sleeper', 'inactive'])->default('inactive');
            $table->integer('opinions')->default(0);
            $table->integer('orders')->default(0);
            $table->integer('closed_orders')->default(0);
            $table->integer('active_orders')->default(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
