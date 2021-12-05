<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusTime extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('competitors', function (Blueprint $table) {
            $table->dateTime('submission_time')->nullable();
            $table->dateTime('submission_approved_time')->nullable();
            $table->integer('submission_approved_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('competitors', function (Blueprint $table) {
            //
        });
    }
}
