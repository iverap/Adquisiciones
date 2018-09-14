<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('detalle', 64);
            $table->integer('monto');
            $table->date('fecha_vencimiento');
            $table->string('observacion', 64)->nullable($value = true);
            $table->boolean('pagado');
            $table->integer('id_pago');
            /*$table->foreign('id_pago')->references('id_pago')->on('pago_compras');*/
            $table->integer('medio_pago');
            /*$table->foreign('medio_pago')->references('id')->on('medio_pagos');*/
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
        Schema::dropIfExists('pagos');
    }
}
