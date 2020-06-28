<?php

use Illuminate\Database\Seeder;

class ProductAskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ProductAsk::class , 25)->create()->each(function($productAsk){
        	$productAsk->save();
        });
    }
}
