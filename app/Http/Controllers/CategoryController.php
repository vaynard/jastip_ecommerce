<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

   // Render Admin Category Page
    public function admin_categoryIndex(){

        // get all categories
        $categories = Category::paginate(8);
        return view('admin.category' , ['categories' => $categories]);
    }

    // Render Admin Category Form Page
    public function admin_categoryformIndex($id = null){

        if($id){
            $categories = Category::find($id);
            return view('admin.category_form' , ['categories' => $categories]);
        }
        return view('admin.category_form' , ['categories' => null]);
    }

    // Create category
    public function admin_categoryformCreate(Request $request){

        Category::create([
            'category_name' => $request['category_name'],
            'is_active' => true,
        ]);

        return redirect('/admin/category');
    }

	// edit category
    public function admin_categoryformEdit(Request $request){

    	$category = Category::find($request->id);
    	$category->category_name = $request->category_name;
    	$category->save();
        return redirect('/admin/category');
    }

    // delete Category
    public function admin_categoryDelete($id){

    	$category = Category::find($id);
    	$category->delete();
        return redirect('/admin/category');
    }


}
