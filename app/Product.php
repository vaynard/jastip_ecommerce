<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_name','product_price','description','capacity','total_capacity','arrival_date','user_id','category_id' , 'destination_id' , 'product_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'is_active'
    ];

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function destination(){
        return $this->belongsTo('App\Destination');
    }

    public function checkoutProduct(){
        return $this->hasMany('App\CheckoutProduct');
    }

    public function askProduct(){
        return $this->hasMany('App\ProductAsk');
    }

}
