<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoriteUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorite_users', function (Blueprint $table) {
            $table->uuid('id_polubionego');
            $table->uuid('id_polubiajacego');
            $table->primary(['id_polubionego', 'id_polubiajacego']);
            $table->dateTime('data_dodania');
            $table->dateTime('data_modyfikacji');
            $table->boolean('czy_usunieto');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorite_users');
    }
}
