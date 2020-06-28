<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Checkout;
use App\CheckoutProduct;
use App\CheckoutStatus;
use App\Notifications\CheckoutNotification;
use App\Notifications\OrderUpdateNotification;
use App\Notifications\CheckoutProductNotification;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use PDF;
use Notification;
use FlashAlert;

class CheckoutController extends Controller
{
    protected $product;

    protected $user;

    protected $checkout;

    protected $checkout_product;

    protected $checkout_status;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        Product $product , 
        User $user,
        Checkout $checkout,
        CheckoutProduct $checkout_product,
        CheckoutStatus $checkout_status
    )
    {
        $this->product = $product;
        $this->user = $user;
        $this->checkout=$checkout;
        $this->checkout_product = $checkout_product;
        $this->checkout_status = $checkout_status;
        //$this->middleware('guest');
    }

    //render Checkout page
    public function index()
    {
        //check cart data
        if(Cart::count() > 0){
            $current_user = Auth::user();
            return view('storefront.checkout.checkout',['current_user'=>$current_user]);
        }else{
            return redirect('/cart');
        }
    }

    //render post checkout data
    public function postCheckout(Request $request){

        //check cart content
        $total_qty = Cart::count();
        
        if($total_qty > 0){
            $cart = Cart::content();
            $total = (float)str_replace(',', '', Cart::total());
            //post checkout data
            // status id 1 = Pending
            $checkout_data = $this->checkout->create([
                'total_price' => $total,
                'total_qty' => $total_qty,
                'status_id' => 1,
                'user_id' => Auth::user()->id
            ]);
            foreach ($cart as $key => $value) {
                $checkout_product_data= $this->checkout_product->create([
                    'checkout_id' => $checkout_data->id,
                    'product_id' => $value->id,
                    'qty' => $value->qty,
                    'price' => $value->price
                ]);

                //add product capacity after checkout
                $product = $this->product->find($value->id);
                $product->capacity += $value->qty;
                $product->save();       
            }     
            //destroy cart content
            Cart::destroy();
            return $this->checkoutComplete($checkout_data);
        }else{
            return redirect('/cart');
        }
    }

    //render checkout complete
    public function checkoutComplete($checkoutData = null){
        $admin = $this->user->find(1);

        //notify admin about checkout
        Notification::send($admin , new CheckoutNotification($checkoutData));

        //notify user about checkout
        foreach ($checkoutData->checkoutProduct as $key => $value) {
            Notification::send($value->product->user, new CheckoutProductNotification($value));
        }
        
        return view('storefront.checkout.checkout_complete' ,['checkout'=> $checkoutData]);
    }

    //render my order page
    public function myOrderIndex(){
        $current_user = Auth::user()->id;

        $orders = $this->checkout->where('user_id',$current_user)->orderBy('created_at','asc')->get();

        /*var_dump($orders);
        exit();*/
        return view('storefront.accounts.myorder',['orders'=> $orders]);
    }

    //render my order detail page
    public function myOrderDetailIndex($id = null){

        if($id){
            $order = $this->checkout->find($id);
            foreach ($order->checkoutProduct as $key => $value) {
                $value->product->checkout_qty = $value->qty;
                $value->product->checkout_price = $value->price;
                $products[$value->product->user->id]['user_id'] = $value->product->user->id;
                $products[$value->product->user->id]['name'] = $value->product->user->name;
                $products[$value->product->user->id]['product'] = [
                    $value->product,
                ];
            }
            //var_dump($products[6]['user_id']);
            //exit();
            return view('storefront.accounts.myorder_detail',['order'=> $order,"products" => $products]);
        }
        return redirect()->back();
    }

    //generate Invoice
    public function generateInvoice($id = null){
        if($id){
            $order = $this->checkout->find($id);
            //var_dump($order->checkoutProduct[0]->product);
           // exit();
           
           // generate pdf
           $invoice_pdf = PDF::loadview('storefront.accounts.myorder_invoice',['order'=> $order]);
            return $invoice_pdf->stream();
        }
        return redirect()->back();
    }

    //update checkout status
    public function updateCheckoutStatus(Request $request){
        //find checkout product id 
        $checkoutProduct = $this->checkout_product->find($request->id);
        $checkoutProduct->checkout->status_id = $request->status;
        $checkoutProduct->checkout->save();

        //send notification about update
        Notification::send($checkoutProduct->checkout->user, new OrderUpdateNotification($checkoutProduct));
        FlashAlert::success('Status order berhasil di Update', 'Status untuk order '.$checkoutProduct->checkout->order_id .' berhasil diupdate');
        return redirect()->back();
    }

    //checkout admin Controller
    //
    
    public function admin_checkoutIndex(){
        //get all checkout data
        $checkouts = $this->checkout->paginate(8);
        return view('admin.checkout.checkout' , ['checkouts' => $checkouts]);
    }

    public function admin_checkoutDetailIndex($id = null){
        if($id){
            //find checkout data
            $checkout = $this->checkout->find($id);
            return view('admin.checkout.checkout_detail',['checkout'=>$checkout]);
        }
        return redirect()->back();
    }
}
