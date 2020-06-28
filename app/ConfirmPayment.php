<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmPayment extends Model
{
	protected $table = 'confirm_payment';
	    /**
	     * The attributes that are mass assignable.
	     *
	     * @var array
	     */
	    protected $fillable = [
	        'order_id','bank_name' ,'account_name','transfer_figure','transfer_date','transfer_photo'
	    ];

	    /**
	     * The attributes that should be hidden for arrays.
	     *
	     * @var array
	     */
	    protected $hidden = [
	    ];

	    public function order(){
    		return $this->belongsTo('App\Checkout');
    	}
}
