<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeleteProvDocs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documentos', function($table) {
            $table->softDeletes();
        });

        Schema::table('proveedores', function($table) {
            $table->softDeletes();
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
            $table->dropColumn('deleted_at');
        });

        Schema::table('documentos', function($table) {
            $table->dropColumn('deleted_at');
        });
    }
}
