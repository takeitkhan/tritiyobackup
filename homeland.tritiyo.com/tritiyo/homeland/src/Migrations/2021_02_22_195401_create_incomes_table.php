<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->integer('ledger_id');
            $table->string('transaction_with_type')->nullable();
            $table->string('transaction_with')->nullable();
            $table->float('per_unit_amount')->nullable();
            $table->float('qty')->nullable();
            $table->float('actual_amount')->nullable();
            $table->float('discount')->nullable();
            $table->float('amount')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('truck_number')->nullable();
            $table->string('token_number')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('incomes');
    }
}
