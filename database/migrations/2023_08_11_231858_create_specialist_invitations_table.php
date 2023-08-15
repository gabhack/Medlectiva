<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('specialist_invitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_id'); // Relación con la tabla hospitals
            $table->string('email'); // El correo electrónico del especialista invitado
            $table->string('token')->unique(); // Token único para el enlace de registro
            $table->timestamps();

            $table->foreign('hospital_id')->references('id')->on('hospitals')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialist_invitations');
    }
};