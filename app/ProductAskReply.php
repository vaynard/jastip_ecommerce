<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAskReply extends Model
{
	protected $table = 'product_asks_reply';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_ask_id','content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function product_ask(){
        return $this->belongsTo('App\ProductAsk');
    }
}
