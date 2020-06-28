<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	//base seed
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(DestinationTableSeeder::class);
         //
        
        //seed user, category , and destination first
        $this->call(ProductTableSeeder::class);

        //seed review
         $this->call(ReviewSeeder::class);
        
        //seed product ask
        $this->call(ProductAskTableSeeder::class);
        $this->call(ProductAskReplyTableSeeder::class);
    }
}
