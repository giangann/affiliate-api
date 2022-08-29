<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('offer')->default(0);
            $table->integer('payout')->default(0);
            $table->integer('tracking')->default(0);
            $table->integer('support')->default(0);
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
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropTimestamps();
            $table->dropColumn('offer');
            $table->dropColumn('payout');
            $table->dropColumn('tracking');
            $table->dropColumn('support');
        });
    }
}
