<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductAskReply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_asks_reply', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_ask_id')->constrained('product_asks')->onDelete('cascade');
            $table->string('content');
            $table->timestamps();

            $table->index('product_ask_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_asks_reply');
    }
}
