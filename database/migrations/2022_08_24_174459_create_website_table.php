<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('link');
            $table->string('link_banner');
            $table->string('link_offer');
            $table->string('api');
            $table->unsignedSmallInteger('referral_commissione');
            $table->unsignedFloat('minimum_payment');
            $table->foreignId('payment_method_id')->constrained();
            $table->foreignId('payment_frequency_id')->constrained();
            $table->foreignId('tracking_software_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
