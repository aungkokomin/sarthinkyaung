<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturerPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('lecturer_payment', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lecturer_id');
            $table->string('refund_amount',50);
            $table->string('refund_payment_method',255);
            $table->text('comment');
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
        Schema::drop('lecturer_payment');
    }
}
