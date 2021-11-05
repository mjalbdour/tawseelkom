<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->boolean('inside_amman');
            $table->dateTime('datetime');
            $table->unsignedFloat('sender_price');
            $table->unsignedFloat('delivery_price');
            $table->boolean('approved');
            $table->boolean('delivered');
            $table->boolean('canceled')->nullable(true);
            $table->text('description');
            $table->timestamps();
            $table->foreign('sender_id')
                ->references('id')
                ->on('users');
            $table->foreign('company_id')
                ->references('id')
                ->on('companies');
            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
