<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competitors', function (Blueprint $table) {
            $table->id();
            $table->integer('competition_category_id')->nullable();
            $table->integer('invoice_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('competition_number')->nullable();
            $table->integer('invoice_number')->nullable();
            $table->integer('competitor_status')->default(0)->nullable();
            $table->integer('lock')->default(0)->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_wa')->nullable();
            $table->integer('total')->default(0)->nullable();
            $table->integer('submission_status')->default(0)->nullable();
            $table->longText('submission_url')->nullable();
            $table->longText('submission_description')->nullable();
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
        Schema::dropIfExists('competitors');
    }
}
