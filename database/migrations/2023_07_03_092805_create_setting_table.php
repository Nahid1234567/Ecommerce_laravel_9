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
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('currency')->nullable;
            $table->string('phone_one')->nullable;
            $table->string('phone_two')->nullable;
            $table->string('main_email')->nullable;
            $table->string('support_email')->nullable;
            $table->string('logo')->nullable;
            $table->string('favicon')->nullable;
            $table->string('address')->nullable;
            $table->string('facebook')->nullable;
            $table->string('twitter')->nullable;
            $table->string('instagram')->nullable;
            $table->string('linkedIn')->nullable;
            $table->string('youtube')->nullable;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting');
    }
};
