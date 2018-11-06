<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigracionCompras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->increments('id_compra');
            $table->integer('categoria')->unsigned();
            $table->integer('documento')->unsigned();
            $table->string('detalle', 64);
            $table->string('descripcion_gasto', 64);
            $table->integer('monto_gasto');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::table('compras', function($table) {
            $table->foreign('categoria')->references('id_categoria')->on('categorias');
            $table->foreign('documento')->references('id_documento')->on('documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
