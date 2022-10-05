<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('semester_id')->unsigned();
            $table->string('ad');
            $table->string('soyad');
            $table->string('fakulte');
            $table->string('bolum');
            $table->string('email')->unique();
            $table->string('unvan');
            $table->string('telefon');
            $table->string('fotograf');
            $table->timestamps();

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
        Schema::dropIfExists('consultants');
    }
}
