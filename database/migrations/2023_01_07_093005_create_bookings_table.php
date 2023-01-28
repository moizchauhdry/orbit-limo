<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->date('pickup_date');
            $table->time('pickup_time');
            $table->string('pickup_location');
            $table->string('drop_location');
            $table->string('total_distance');
            $table->string('total_time');
            $table->string('duration_in_hours')->nullable();
            $table->string('service_type');
            $table->string('transfer_type');
            $table->bigInteger('vehicle_id')->unsigned();
            $table->bigInteger('driver_id')->unsigned()->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('comments')->nullable();
            $table->double('grand_total')->default(0);
            $table->string('payment_method', 100)->nullable();
            $table->tinyInteger('payment_status')->default(0);
            $table->tinyInteger('booking_status')->default(0);
            $table->tinyInteger('driver_status')->default(0);
            $table->tinyInteger('ride_status')->default(0);
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
        Schema::dropIfExists('bookings');
    }
}
