<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Auth;

class NotificationController extends Controller
{
    protected $user;

    protected $product;

    public function __construct(User $user ,Product $product){
    	$this->user = $user;
    	$this->product = $product;
    }

    public function notificationIndex(){
        $current_user = Auth::user();
        $notifications = $current_user->notifications;

        //mark as read
        $current_user->unreadNotifications->markAsRead();
        return view('storefront.accounts.notification' , ['notifications' => $notifications]);
    }
}
