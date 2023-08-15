<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBooleanFieldsToProgramsTable extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->boolean('acepta_estudiantes_medicina')->default(false);
            $table->boolean('acepta_medicos_generales')->default(false);
            $table->boolean('acepta_residentes')->default(false);
            $table->boolean('acepta_fellows')->default(false);
            $table->boolean('acepta_especialistas')->default(false);
            $table->boolean('hace_consulta_externa')->default(false);
            $table->boolean('hace_procedimientos')->default(false);
            $table->boolean('hace_hospitalizacion')->default(false);
            $table->boolean('hace_cirugia')->default(false);
        });
    }

    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('acepta_estudiantes_medicina');
            $table->dropColumn('acepta_medicos_generales');
            $table->dropColumn('acepta_residentes');
            $table->dropColumn('acepta_fellows');
            $table->dropColumn('acepta_especialistas');
            $table->dropColumn('hace_consulta_externa');
            $table->dropColumn('hace_procedimientos');
            $table->dropColumn('hace_hospitalizacion');
            $table->dropColumn('hace_cirugia');
        });
    }
}
