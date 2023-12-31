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
        Schema::create('pickup_point', function (Blueprint $table) {
            $table->id();
            $table->string('pickup_point_name')->nullable;
            $table->string('pickup_point_address')->nullable;
            $table->string('pickup_point_phone')->nullable;
            $table->string('pickup_point_phone_two')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pickup_point');
    }
};
