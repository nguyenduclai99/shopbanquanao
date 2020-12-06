<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->string('a_delivery_date')->nullable();
            $table->string('a_appointment_date')->nullable();
            $table->unsignedBigInteger('a_user_id')->nullable()->index();
            $table->timestamps();
        });

        Schema::table('appointment', function (Blueprint $table) {
            $table->foreign('a_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
}
