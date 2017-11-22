<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('lecturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',100);
            $table->string('password',100);
            $table->string('name',255);
            $table->text('address');
            $table->date('DOB');
            $table->string('email',255);
            $table->string('phone',50);
            $table->string('nrc',100);
            $table->string('gender',20);
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
        //
        Schema::drop('lecturers');
    }
}
