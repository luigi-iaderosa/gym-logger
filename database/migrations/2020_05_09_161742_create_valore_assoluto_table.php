<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValoreAssolutoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('esercizio', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('descrizione');
            $table->decimal('valore_assoluto_sforzo',6,3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('valore_assoluto');
    }
}
