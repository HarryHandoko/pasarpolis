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
        Schema::create('request_claims', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('product_profit_id');
            $table->date('tanggal');
            $table->text('kwitansi');
            $table->string('bank');
            $table->string('no_rekening');
            $table->string('name_bank');
            $table->string('status');
            $table->date('date_response')->nullable();
            $table->text('alasan')->nullable();
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
        Schema::dropIfExists('request_claims');
    }
};
