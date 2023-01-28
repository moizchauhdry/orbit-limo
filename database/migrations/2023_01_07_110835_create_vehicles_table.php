<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('image')->nullable();
            $table->boolean('status')->default(true);
            $table->tinyInteger('passenger');
            $table->tinyInteger('suitcase');

            // Point to Point (ptp)
            $table->double('ptp_min_amount');
            $table->double('ptp_min_distance');
            $table->double('ptp_adt_amount_per_km');
            $table->double('ptp_amount_peak_hrs');
            $table->string('ptp_peak_hrs');
            $table->double('ptp_amount_per_stop');
            // Hourly (Hrly)
            $table->double('hrly_min_amount');
            $table->double('hrly_min_hour');
            $table->double('hrly_adt_amount_per_hour');
            $table->double('hrly_amount_per_km_allowed');

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
        Schema::dropIfExists('vehicles');
    }
}
