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
            $table->string('name');
            $table->enum('size', array_keys(config('constants.vehicle_sizes')))
                ->index();
            $table->unsignedFloat('price_in_amman');
            $table->unsignedFloat('price_outside_amman');
            $table->unsignedBigInteger('company_id')
                ->index();
            $table->boolean('available')->default(true);
            $table->timestamps();
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
            ->onDelete('cascade');
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
