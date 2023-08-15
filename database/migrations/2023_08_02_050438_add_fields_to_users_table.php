<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('birth_date')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('current_medical_training')->nullable();
            $table->string('specialty_of_interest')->nullable();
            $table->integer('hospital_id')->nullable();
            $table->string('medical_specialty')->nullable();
            $table->string('workplace')->nullable();
            $table->string('nationality')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birth_date');
            $table->dropColumn('country');
            $table->dropColumn('phone_number');
            $table->dropColumn('current_medical_training');
            $table->dropColumn('specialty_of_interest');
            $table->dropColumn('hospital_id');
            $table->dropColumn('medical_specialty');
            $table->dropColumn('workplace');
            $table->dropColumn('nationality');
        });
    }
}