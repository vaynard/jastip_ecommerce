<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Destination;
use Srmklive\FlashAlert\Facades\FlashAlert;

class HomeController extends Controller
{

    protected $category;

    protected $product;

    protected $destination;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Category $category , 
        Product $product,
        Destination $destination
    )
    {
        $this->category = $category;
        $this->product = $product;
        $this->destination = $destination;
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get product data
        $latest_products = $this->product->where('is_active',1)->whereDate('arrival_date','>=',now())->orderBy('created_at','desc')->limit(6)->get();

        //get popular product
        $popular_products = $this->product->where('is_active',1)->whereDate('arrival_date','>=',now())->orderBy('capacity','desc')->limit(6)->get();

        //get category data
        $category = $this->category->where('is_active',1)->limit(4)->get();

        //get destination
        $destinations = $this->destination->where('is_active',1)->limit(4)->get();
        return view('storefront.home',['latest_products' => $latest_products,'destinations'=>$destinations,'categories'=>$category,'popular_products'=>$popular_products]);
    }

    //render about us page
    public function aboutUsIndex(){
        return view('storefront.about-us');
    }

    //render our service page
    public function ourServiceIndex(){
        return view('storefront.our-service');
    }
}
