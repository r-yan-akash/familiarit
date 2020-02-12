<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day');
            $table->string('contact_1');
            $table->string('contact_2');
            $table->string('email_1');
            $table->string('email_2');
            $table->string('address');
            $table->string('meta');
            $table->string('google_analytics');
            $table->string('fb_id');
            $table->string('pinterest');
            $table->string('instagram');
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
        Schema::dropIfExists('settings');
    }
}
