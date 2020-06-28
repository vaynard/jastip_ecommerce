<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $table = 'reviews';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reviewer_id','reviewee_id','rating','review'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'is_active'
    ];

    public function reviewer(){
        return $this->belongsTo('App\User' , 'reviewer_id','id');
    }

    public function reviewee(){
        return $this->belongsTo('App\User' ,'reviewee_id' ,'id');
    }
}
