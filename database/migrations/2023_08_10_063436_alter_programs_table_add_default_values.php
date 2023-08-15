<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProgramsTableAddDefaultValues extends Migration
{
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->string('nombre')->default('')->change();
            $table->string('ciudad')->default('')->change();
            $table->string('pais')->default('')->change();
            $table->date('fecha_inicio')->default(now())->change();
            $table->date('fecha_fin')->default(now()->addYear())->change();
            $table->string('descripcion', 100)->default('')->change();
            $table->string('especialista_descripcion', 100)->default('')->change();
            $table->string('tipo_rotacion')->default('')->change();
        });
    }

    public function down()
    {
        // Aquí puedes revertir los cambios si es necesario
    }
}