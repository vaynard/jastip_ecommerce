<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Review;
use Srmklive\FlashAlert\Facades\FlashAlert;
use Auth;
use App\Notifications\ReviewNotification;
use Notification;

class ReviewController extends Controller
{
    protected $user;

    protected $review;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        User $user,
        Review $review
    )
    {
        $this->user = $user;
        $this->review = $review;
        //$this->middleware('guest');
    }

    //render review form
    public function index($id = null){
    	if($id){
    		$user = $this->user->find($id);
    		return view('storefront.review.review' , ['user' => $user]);
    	}
    	return redirect()->back();
    }

    //render review admin
    public function admin_reviewIndex(){

        $reviews = $this->review->where('is_active',1)->orderBy('created_at','desc')->paginate(8);
        return view('admin.review.review' , ['reviews' => $reviews]);
    }

    //delete review
    public function admin_reviewDelete($id = null){
        if($id){
            $review = $this->review->find($id);
            $review->is_active = 0;
            $review->save();
            return redirect()->back();
        }
        return redirect()->back();
    }

    //create review
    public function create(Request $request){

    //validasi form
    $validatedData = $request->validate([
        'rating' => 'required|numeric',
        'review' => 'required |max:255',
    ]);

    $review_data =$this->review->create([
            'rating' => $request['rating'],
            'review' => $request['review'],
            'reviewer_id'=> Auth::user()->id,
            'reviewee_id' => $request['user_id'],
        ]);

        //get user reviewer data
        $user_data = $this->user->find($request['user_id']);
        Notification::send($user_data, new ReviewNotification($review_data));
        FlashAlert::success('Review Berhasil', 'Review berhasil dipost');
        return redirect('/');
    }
}
