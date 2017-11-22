<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->unsignedInteger('lecturer_id');
            $table->text('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('course_fee',50);
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
        Schema::drop('courses');
    }
}
