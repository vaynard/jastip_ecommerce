<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm_payment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('checkout')->onDelete('cascade');
            $table->string('bank_name');
            $table->string('account_name');
            $table->decimal('transfer_figure' , 8 ,2);
            $table->date('transfer_date');
            $table->string('transfer_photo');
            $table->timestamps();

             $table->index('order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirm_payment');
    }
}
