<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ConfirmPayment;
use App\User;
use App\Checkout;

class AdminController extends Controller
{

    protected $product;

    protected $confirm_payment;

    protected $user;

    protected $checkout;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Product $product ,
        ConfirmPayment $confirm_payment,
        User $user,
        Checkout $checkout
    )
    {
        $this->product = $product;
        $this->confirm_payment = $confirm_payment;
        $this->user = $user;
        $this->checkout = $checkout;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //get latest product data
        $products = $this->product->where('is_active',1)->orderBy('created_at','desc')->limit(5)->get();

        //count total user
        $user = $this->user->count();

        //count total product
        $count_total_product = $this->product->where('is_active',1)->count();

        //count total checkout
        $count_checkout = $this->checkout->count();
        
        //get latest confirmation product
        $confirm_payment_data = $this->confirm_payment->orderBy('created_at','desc')->limit(5)->get();
        return view('admin.dashboard',['products'=> $products,'confirm_payments'=> $confirm_payment_data,'count_user'=> $user,'count_product'=>$count_total_product,'count_checkout'=> $count_checkout]);
    }

}
