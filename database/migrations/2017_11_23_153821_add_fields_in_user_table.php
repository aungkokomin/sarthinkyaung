<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsInUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users',function(Blueprint $table){
            $table->text('address');
            $table->date('DOB');
            $table->string('phone',50);
            $table->string('nrc',100);
            $table->string('gender',20);
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
        Schema::table('users',function(Blueprint $table){
            $table->dropColumn('address');
            $table->dropColumn('DOB');
            $table->dropColumn('phone');
            $table->dropColumn('nrc');
            $table->dropColumn('gender');
        });
    }
}
