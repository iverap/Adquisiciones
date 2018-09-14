<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaCorrientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_corrientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('banco', 32);
            $table->date('fecha');
            $table->string('nombre', 32);
            $table->string('detalle', 64);
            $table->integer('monto');
            $table->string('observacion', 64)->nullable($value = true);
            $table->integer('id_pago');
            /*$table->foreign('id_pago')->references('id')->on('pagos');*/
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
        Schema::dropIfExists('cuenta_corrientes');
    }
}
