<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeToProgramUserTable extends Migration
{
    public function up()
    {
        Schema::table('program_user', function (Blueprint $table) {
            // Añadir columna 'type' con valor por defecto 'Especialista'
            $table->string('type')->default('Especialista')->after('user_id');
        });
    }

    public function down()
    {
        Schema::table('program_user', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}