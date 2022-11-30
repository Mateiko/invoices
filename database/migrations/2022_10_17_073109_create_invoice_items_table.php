<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->integer('quantity')->unsigned();
            $table->float('price', 8, 2)->unsigned();
            $table->float('discount')->default(0)->unsigned();
            $table->float('total_price')->unsigned()->default(0);
            $table->text('description')->nullable();
            $table->unsignedBigInteger('unit_of_measure_id');
            $table->unsignedBigInteger('invoice_id');
            $table->timestamps();

            $table->foreign('unit_of_measure_id')->references('id')->on('unit_of_measures');
            $table->foreign('invoice_id')->references('id')->on('invoices');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_items');
    }
};
