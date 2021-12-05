<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('competition_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('competition_type_id')->nullable();
            $table->string('competition_level_id')->nullable();
            $table->string('competition_gender_id')->nullable();
            $table->string('code')->nullable();
            $table->string('class')->nullable();
            $table->integer('quota')->nullable();
            $table->integer('isOnline')->default(1)->nullable();
            $table->integer('isTeam')->default(0)->nullable();
            $table->integer('member')->default(1)->nullable();
            $table->integer('teamMember')->default(0)->nullable();
            $table->integer('price')->nullable();
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
        Schema::dropIfExists('competition_categories');
    }
}
