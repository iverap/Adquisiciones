<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id_documento');
            $table->integer('numero_documento');
            $table->integer('proveedor')->unsigned();
            $table->date('fecha_documento');
            $table->date('fecha_vencimiento');
            $table->string('tipo',30);
            $table->integer('monto_documento');
            $table->string('documento_original');
            $table->timestamps();
        });

        Schema::table('documentos', function($table) {
            $table->foreign('proveedor')->references('id_proveedor')->on('proveedores');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}
