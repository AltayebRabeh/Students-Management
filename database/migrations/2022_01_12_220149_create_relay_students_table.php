<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelayStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relay_students', function (Blueprint $table) {
            $table->id();
            $table->boolean('reject')->default(false);
            $table->tinyInteger('from_classroom');
            $table->tinyInteger('to_classroom');
            $table->tinyInteger('from_year');
            $table->tinyInteger('to_year');
            $table->foreignId('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('relay_id')->references('id')->on('relays')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relay_students');
    }
}
