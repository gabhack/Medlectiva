<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migración para la tabla 'especialidades'
class CreateEspecialidadesTable extends Migration
{
    public function up()
    {
        Schema::create('especialidads', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('especialidads');
    }
}

// Migración para la tabla 'hospitales'
