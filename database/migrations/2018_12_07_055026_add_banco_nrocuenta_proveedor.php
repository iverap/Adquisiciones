<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBancoNrocuentaProveedor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proveedores', function (Blueprint $table) {
            $table->string('banco','50')->nullable();
            $table->string('nro_cuenta','50')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proveedores', function($table) {
            $table->dropColumn('banco');
            $table->dropColumn('nro_cuenta');
        });
    }
}
