<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0)->nullable();
            $table->integer('approved_by')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->integer('subtotal')->default(0)->nullable();
            $table->integer('total')->default(0)->nullable();
            $table->integer('payment_method_id')->default(0)->nullable();
            $table->string('proof_of_transfer')->nullable();
            $table->string('bank')->nullable();
            $table->string('ref_name')->nullable();
            $table->string('ref_number')->nullable();
            $table->string('uuid')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
