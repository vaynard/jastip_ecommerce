<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckoutStatus extends Model
{
	protected $table = 'checkout_status';
	    /**
	     * The attributes that are mass assignable.
	     *
	     * @var array
	     */
	    protected $fillable = [
	        'status_name'
	    ];

	    /**
	     * The attributes that should be hidden for arrays.
	     *
	     * @var array
	     */
	    protected $hidden = [
	    ];

    public function checkout(){
        return $this->hasMany('App\Checkout');
    }
}
