<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Illuminate\Support\Facades\Auth;
use FlashAlert;

class UserController extends Controller
{

    protected $user;

    protected $curr_user;

    protected $product;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user, Product $product)
    {
        $this->user = $user;
        $this->product = $product;
        //$this->middleware('guest');
    }

    public function adminIndex()
    {
    	//get all users
    	$users = $this->user->paginate(8);
        return view('admin.user' , ['users' => $users]);
    }

    //edit admin form
    public function adminEditIndex($id = null){
        if($id){
            //find user data
            $user = $this->user->find($id);
            return view('admin.user_form',['user'=>$user]);
        }
        return redirect()->back();
    }

    public function accountIndex()
    {
        //get current log in user
        $current_user = Auth::user();
        return view('storefront.accounts.account' , ['curr_user' => $current_user]);
    }

    //get edit Account form
    public function editAccountForm()
    {
        //get current log in user
        $current_user = Auth::user();
        return view('storefront.accounts.edit_account' , ['curr_user' => $current_user]);
    }

    //update account
    public function update(Request $request){
    
    //validasi form
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'phone_number' => 'required',
        'city' => 'required',
        'address' => 'required',
    ]);
        //find user by current user login id
        $user = $this->user->find($request->user_id);
        //var_dump($request->user_id);
        //exit();
        //check if user has avatar
        if($request->hasFile('avatar')){
            $filenameWithExt=$request->file('avatar')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('avatar')->getClientOriginalExtension();
            $fileNameToStore= date('mdYHis') . uniqid() .$filename.'.'.$extension;
            request()->avatar->move(public_path('avatar'), $fileNameToStore);  

            //input path to user model
            $user->avatar = $fileNameToStore;
        }
        if(isset($request->name)){
            $user->name = $request->name;
        }
        if($request->gender != ''){
            $user->gender = $request->gender;
        }
        if(isset($request->address)){
            $user->address = $request->address;
        }
        if(isset($request->phone_number)){
            $user->phone_number = $request->phone_number;
        }
        if(isset($request->city)){
            $user->city = $request->city;
        }
        if(isset($request->line_id)){
            $user->line_id = $request->line_id;
        }
        if(isset($request->twitter_id)){
            $user->twitter_id = $request->twitter_id;
        }
        if(isset($request->instagram_id)){
            $user->instagram_id = $request->instagram_id;
        }
        $user->save();

        $current_user = Auth::user();

        //check if user performing update is admin
        if($current_user->is_admin){
            return redirect('admin/user');
        }
        FlashAlert::success('Berhasil', 'Profile Anda berhasil di Update');
        return redirect('/account'); 
    }

}
