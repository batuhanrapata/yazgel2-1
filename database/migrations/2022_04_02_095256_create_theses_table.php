<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('consultant_id')->unsigned();
            $table->string('word_dosyasi');
            $table->string('pdf_dosyasi');
            $table->enum('durum',['aktif','pasif','bekleniyor'])->default('bekleniyor');
            $table->timestamps();

            $table->foreign('student_id')
            ->references('id')
            ->on('students');

            $table->foreign('consultant_id')
            ->references('id')
            ->on('consultants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theses');
    }
}
