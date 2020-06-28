<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Checkout;
use Srmklive\FlashAlert\Facades\FlashAlert;
use Auth;

class CheckTransactionController extends Controller
{
    protected $checkout;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Checkout $checkout
    )
    {
        $this->checkout=$checkout;
    }

    //render Check Transaction page
    public function index()
    {
        return view('storefront.checkout.check_transaction');
    }

    public function checkTransaction(Request $request){

    	$order_data = $this->checkout->find($request->order_id);

    	if($order_data){
    		//chek if order is current user order
    		if(Auth::user()->id == $order_data->user->id){
    			return redirect()->route('myOrderDetail',[$order_data->id]);
    		}else{
    			FlashAlert::warning('Order ID tidak ditemukan', 'Order ID : '.$request->order_id. ' tidak ditemukan');
    			return redirect()->back();
    		}
    	}else{
    		FlashAlert::warning('Order ID tidak ditemukan', 'Order ID : '.$request->order_id. ' tidak ditemukan');
    		return redirect()->back();
    	}
    	return redirect()->back();
    }
}
