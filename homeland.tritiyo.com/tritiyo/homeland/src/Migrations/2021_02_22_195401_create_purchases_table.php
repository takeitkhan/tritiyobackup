<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('sand_type');
            $table->integer('bolgate_id')->nullable();
            $table->float('per_unit_amount')->nullable();
            $table->float('loading_cost')->nullable();
            $table->float('bolgate_cost')->nullable();
            $table->float('unloading_cost')->nullable();
            $table->float('actual_amount')->nullable();
            $table->integer('qty')->nullable();
            $table->float('amount')->nullable();
            $table->float('target_sale_amount')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
