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
            $table->string('description');
            $table->string('tracking_link')->default('N/A');
            $table->string('manager')->default('N/A');
            $table->string('commision_type')->default('N/A');
            $table->unsignedSmallInteger('offer_count');
            $table->unsignedSmallInteger('referral_commission')->default(rand(1,10));
            $table->unsignedFloat('minimum_payment')->default(rand(50,250));
            $table->foreignId('payment_method_id')->constrained()->default(rand(1,3));
            $table->foreignId('payment_frequency_id')->constrained()->default(rand(1,3));
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
