<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuadrosNotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quadros_notas', function (Blueprint $table) {
            $table->foreign('id_quadros')
                ->references('id')
                ->on('quadros')
                ->onDelete('cascade');
            $table->bigInteger('id_notas');
            $table->integer('order');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quadros_notas');
    }
}
