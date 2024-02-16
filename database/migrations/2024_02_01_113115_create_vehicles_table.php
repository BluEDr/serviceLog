<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('brand');
            $table->string('model')->nullable();
            $table->string('plate_number')->nullable();
            $table->integer('km')->nullable();
            $table->float('cc',8,2)->nullable();
            $table->integer('hp')->nullable();
            $table->string('color')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->integer('registration_year')->nullable();
            $table->integer('registration_month')->nullable();
            $table->unsignedBigInteger('gas_type_id')->nullable();
            $table->unsignedBigInteger('mechanic_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('mechanic_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('gas_type_id')->references('id')->on('gas_types')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('vehicle');
    }
};
