<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Srmklive\FlashAlert\Facades\FlashAlert;

class CartController extends Controller
{
    public function __construct(User $user, Product $product)
    {
        $this->user = $user;
        $this->product = $product;
        //$this->middleware('guest');
    }

    //render cart view
    public function index()
    {
    	//get Cart data
    	$carts = Cart::content();
    	$subtotal = Cart::subtotal();
    	$total = Cart::total();
    	//error_log($carts);
        return view('storefront.cart.cart' , ['carts'=> $carts,'total' => $total , 'subtotal' => $subtotal]);
    }

    //add to Cart
    public function addToCart(Request $request)
    {
        //get product data
        $productData = $this->product->find($request->id);

        //check is qty var isset
        if(isset($request->quantity)){
            
            //check product capacity
            $capacity = $productData->capacity + $request->quantity;
            if($capacity > $productData->total_capacity){
               FlashAlert::warning('Melebihi Kapasitas', 'Barang yang dibeli melebihi kapasitas pembelian');
                return redirect()->back();
            }else{
            	Cart::add(
                    [
                        'id' => $productData->id, 
                        'name' => $productData->product_name, 
                        'qty' => $request->quantity > 1 ? $request->quantity : 1, 
                        'price' => $productData->product_price,
                        'weight' => 0,
                        'options' => ['image' => $productData->product_image]
                    ]
                );
            }
        }else{

            //check product capacity
            $capacity = $productData->capacity + 1;
            if($capacity > $productData->total_capacity){
                FlashAlert::warning('Melebihi Kapasitas', 'Barang yang dibeli melebihi kapasitas pembelian');
                return redirect()->back();
            }else{
                Cart::add(
                    [
                        'id' => $productData->id, 
                        'name' => $productData->product_name, 
                        'qty' => 1, 
                        'price' => $productData->product_price,
                        'weight' => 0,
                        'options' => ['image' => $productData->product_image]
                    ]
                );
            }         
        }

        FlashAlert::success('Keranjang Bertambah', $productData->product_name.' berhasil dimasukkan ke Keranjang');
        return redirect()->back();
    }

    //remove product from cart
    public function removeCart($rowId = null){
	    if($rowId){
            Cart::remove($rowId);
	    	return redirect()->back();
        }
    }

    //remove all cart
    public function removeAllCart()
    {
	    Cart::destroy();
	    return redirect()->back();
    }

    //update Cart
    public function updateCart(Request $request){

        //add cart content
        $cart = Cart::content();
        foreach ($request->quantity as $id => $qty) {
            //search cart content by product id
            $cart_data = Cart::search(function($cartItem , $rowId) use ($id){
                return $cartItem->id === $id;
            })->first();

            //check if qty = 0 , remove cart data
            if($qty < 0){
                //remove cart
                $this->removeCart($cart_data->rowId);
            }else{
                //get product data
                $productData = $this->product->find($id);
                if($qty > $productData->total_capacity){
                    return redirect()->back();
                }else{
                    //update cart
                    Cart::update($cart_data->rowId , $qty);
                }
            }
        }
        return redirect()->back();
    }

}
