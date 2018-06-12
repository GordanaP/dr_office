<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProfileWorkingDay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_working_day', function (Blueprint $table) {

            $table->unsignedInteger('profile_id');
            $table->foreign('profile_id')->references('id')->on('profiles')->onDelete('cascade');

            $table->unsignedInteger('working_day_id');
            $table->foreign('working_day_id')->references('id')->on('working_days')->onDelete('cascade');

            $table->string('start_at')->nullable();
            $table->string('end_at')->nullable();

            $table->unique(['profile_id', 'working_day_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_working_day');
    }
}
