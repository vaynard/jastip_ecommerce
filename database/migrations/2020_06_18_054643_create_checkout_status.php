<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout_status', function (Blueprint $table) {
            $table->id();
            $table->string('status_name');
            $table->timestamps();
        });

        //insert checkout_status
        DB::table('checkout_status')->insert([
            array(
                'status_name' => 'Pending',
                'created_at' => now(),
                'updated_at' =>now(),
            ),
            array(
                'status_name' => 'Processing (Paid)',
                'created_at' => now(),
                'updated_at' =>now(),
            ),
            array(
                'status_name' => 'Arrived',
                'created_at' => now(),
                'updated_at' =>now(),
            ),
            array(
                'status_name' => 'Shipping',
                'created_at' => now(),
                'updated_at' =>now(),
            ),
            array(
                'status_name' => 'Complete',
                'created_at' => now(),
                'updated_at' =>now(),
            )
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkout_status');
    }
}
