<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveEnddateAndAddImgFieldFromCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('courses',function(Blueprint $table){
            $table->string('img',255);
            $table->string('duration',100);
            $table->unsignedInteger('category_id');
            $table->dropColumn('end_date');
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
        Schema::table('courses',function(Blueprint $table){
            $table->dropColumn('img');
            $table->dropColumn('category_id');
            $table->dropColumn('duration');
            $table->date('end_date');
        });
    }
}
