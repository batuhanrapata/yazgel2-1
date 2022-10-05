<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('consultant_id')->unsigned();
            $table->bigInteger('semester_id')->unsigned();
            $table->string('ad');
            $table->string('soyad');
            $table->string('numarasi')->unique();
            $table->string('fakulte');
            $table->string('bolum');
            $table->integer('sinif');
            $table->string('fotograf');
            $table->string('telefon');
            $table->string('email')->unique();
            $table->timestamps();

            $table->foreign('consultant_id')
                  ->references('id')
                  ->on('consultants');

            $table->foreign('semester_id')
                  ->references('id')
                  ->on('semesters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
