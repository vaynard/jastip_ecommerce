<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
	protected $table = 'checkout';
	    /**
	     * The attributes that are mass assignable.
	     *
	     * @var array
	     */
	    protected $fillable = [
	        'total_price','total_qty','status_id','user_id'
	    ];

	    /**
	     * The attributes that should be hidden for arrays.
	     *
	     * @var array
	     */
	    protected $hidden = [
	        'is_active'
	    ];

	public function getOrderIdAttribute(){
    	return str_pad($this->id, 5,'0', STR_PAD_LEFT);
    }

    public function status(){
    	return $this->belongsTo('App\CheckoutStatus');
    }

	public function checkoutProduct(){
        return $this->hasMany('App\CheckoutProduct');
    }

	public function user(){
        return $this->belongsTo('App\User');
    }

    public function confirmPayment(){
        return $this->hasMany('App\ConfirmPayment');
    }


}
