<?php

use Illuminate\Database\Seeder;

class DestinationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Destination::class , 5)->create()->each(function($destination){
        	$destination->save();
        });
    }
}
