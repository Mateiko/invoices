<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('tin_jmbg')->unique();
            $table->string('activity_code')->nullable();
            $table->string('company_name')->nullable();
            $table->string('bank_account')->unique();
            $table->string('phone_number');
            $table->string('name');
            $table->string('surname');
            $table->string('address');
            $table->string('city');
            $table->string('email')->unique();
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
        Schema::dropIfExists('clients');
    }
};
