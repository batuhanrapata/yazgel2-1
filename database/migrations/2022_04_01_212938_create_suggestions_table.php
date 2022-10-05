<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggestions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('consultant_id')->unsigned();
            $table->text('baslik');
            $table->longText('amac');
            $table->longText('anahtar_kelimeler');
            $table->longText('yontem');
            $table->enum('durum',['onaylandı','reddedildi','bekleniyor'])->default('bekleniyor');
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
        Schema::dropIfExists('suggestions');
    }
}
