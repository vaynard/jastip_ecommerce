<?php

use Illuminate\Database\Seeder;

class ProductAskReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductAskReply::class , 10)->create()->each(function($productAsk){
        	$productAsk->save();
        });
    }
}
