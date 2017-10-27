<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PortfeleTransakcje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfele_transakcje', function (Blueprint $table) {
            $table->uuid('id_transakcji');
            $table->primary('id_transakcji');
            $table->uuid('id_portfela');
            $table->dateTime('data_dodania');
            $table->float('stan_konta_przed', 8, 2)->default(0)->unsigned();
            $table->float('stan_konta_po', 8, 2)->default(0)->unsigned();
            $table->string('typ_transakcji');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('portfele_transakcje');
    }
}
