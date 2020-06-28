<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAsk extends Model
{
	protected $table = 'product_asks';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','product_id','content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function reply(){
        return $this->hasOne('App\ProductAskReply');
    }
}
