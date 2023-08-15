<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNitToHospitalsTable extends Migration
{
    public function up()
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->string('NIT')->nullable()->after('direccion'); // El campo NIT puede ser nulo y lo agregamos después de 'direccion'
        });
    }

    public function down()
    {
        Schema::table('hospitals', function (Blueprint $table) {
            $table->dropColumn('NIT'); // Eliminamos el campo NIT si decidimos revertir esta migración
        });
    }
}