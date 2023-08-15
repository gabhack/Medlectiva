<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('ciudad');
            $table->string('pais');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->integer('duracion');
            $table->string('duracion_unidad');
            $table->string('descripcion', 100);
            $table->foreignId('especialidad_id')->constrained()->onDelete('cascade');
            $table->foreignId('hospital_id')->constrained()->onDelete('cascade');
            $table->foreignId('especialista_id')->constrained('users')->onDelete('cascade');
            $table->string('especialista_descripcion', 100);
            $table->string('nivel_formacion');
            $table->text('actividades');
            $table->string('tipo_rotacion');
            $table->json('especialistas_adicionales');
            $table->boolean('requiere_carta')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('programs');
    }
}