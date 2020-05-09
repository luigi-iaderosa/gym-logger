<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorklogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worklog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('data_worklog');
            $table->integer('esercizio_id');
            $table->integer('serie');
            $table->integer('sforzo');
            $table->integer('unita_misura');
            $table->integer('ripetizioni');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worklog');
    }
}
