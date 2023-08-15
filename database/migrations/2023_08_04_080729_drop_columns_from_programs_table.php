<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnsFromProgramsTable extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('duracion');
            $table->dropColumn('duracion_unidad');
            $table->dropColumn('actividades');
            $table->dropColumn('nivel_formacion');
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->integer('duracion');
            $table->string('duracion_unidad');
            $table->text('actividades');
            $table->string('nivel_formacion');
        });
    }
}