<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLecturerStatusAndInLecturerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('lecturers', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->unsignedInteger('status');
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
        Schema::table('lecturers', function (Blueprint $table) {
            $table->string('username',100);
            $table->dropColumn('status');
        });
    }
}
