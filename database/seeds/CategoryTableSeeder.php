<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    \DB::table('categories')->insert(array (
	        0 => 
	          array (
	                 'category_name' => 'Makanan',
	                 'is_active' => 1,
		            'created_at'=>date('Y-m-d H:i:s'),
		            'updated_at'=>date('Y-m-d H:i:s'),
	         ),
	        1 => 
	          array (
	                 'category_name' => 'Elektronik',
	                 'is_active' => 1,
		            'created_at'=>date('Y-m-d H:i:s'),
		            'updated_at'=>date('Y-m-d H:i:s'),
	         ),
	        2 => 
	          array (
	                 'category_name' => 'Pakaian',
	                 'is_active' => 1,
		            'created_at'=>date('Y-m-d H:i:s'),
		            'updated_at'=>date('Y-m-d H:i:s'),
	         ),
	        3 => 
	          array (
	                 'category_name' => 'Figurine',
	                 'is_active' => 1,
		            'created_at'=>date('Y-m-d H:i:s'),
		            'updated_at'=>date('Y-m-d H:i:s'),
	         ),
	     ));
    }
}
