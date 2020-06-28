<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckoutProduct extends Model
{
	protected $table = 'checkout_products';
	    /**
	     * The attributes that are mass assignable.
	     *
	     * @var array
	     */
	    protected $fillable = [
	        'checkout_id','product_id','qty','price'
	    ];

	    /**
	     * The attributes that should be hidden for arrays.
	     *
	     * @var array
	     */
	    protected $hidden = [
	       
	    ];

	public function checkout(){
    	return $this->belongsTo('App\Checkout');
    }

    public function product(){
    	return $this->belongsTo('App\Product');
    }
}
