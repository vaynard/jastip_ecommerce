<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
	protected $table = 'destinations';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'destination_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'is_active'
    ];

    public function product(){
        return $this->hasMany('App\Product');
    }

}
