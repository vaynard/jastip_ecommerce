<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConfirmPayment;
use App\Checkout;
use App\User;
use App\Notifications\ConfirmPaymentNotification;
use FlashAlert;
use Notification;

class ConfirmPaymentController extends Controller
{

	protected $confirm_payment;

    protected $checkout;

    protected $user;

	public function __construct(
        ConfirmPayment $confirm_payment,
        Checkout $checkout,
        User $user
    ){
		$this->confirm_payment = $confirm_payment;
        $this->checkout = $checkout;
        $this->user= $user;
	}

    // render confirm payment page
    public function confirmPaymentForm(){
        return view('storefront.checkout.confirm_payment');
    }

    //create confirm payment
    public function create(Request $request){

    	//validasi form
	    $validatedData = $request->validate([
	        'order_id' => 'required|max:255',
	        'bank_name' => 'required|max:100',
	        'account_name' => 'required|max:100',
	        'transfer_figure' => 'required|numeric',
	        'transfer_date' => 'required',
	        'transfer_photo' => 'required'
	    ]);

        $order_id = (int)ltrim($request->order_id,0);

        //check order id data
        $checkout_data = $this->checkout->find($order_id);

        //if there's checkout data
        if($checkout_data){
            if($request->hasFile('transfer_photo')){
                $filenameWithExt=$request->file('transfer_photo')->getClientOriginalName();
                $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
                $extension=$request->file('transfer_photo')->getClientOriginalExtension();
                $fileNameToStore= date('mdYHis') . uniqid() .$filename.'.'.$extension;
                request()->transfer_photo->move(public_path('transfer_figure_img'), $fileNameToStore);
            }else{
                $fileNameToStore = 'transfer_placeholder.png';
            }

            //insert confirm payment to database
            $confirmPaymentData = $this->confirm_payment->create([
                'order_id' => $request['order_id'],
                'bank_name' => $request['bank_name'],
                'account_name'=> $request['account_name'],
                'transfer_figure'=> $request['transfer_figure'],
                'transfer_date' =>$request['transfer_date'],
                'transfer_photo' =>$fileNameToStore
            ]);

            //send notification to admin
            $admin = $this->user->find(1);
            Notification::send($admin , new ConfirmPaymentNotification($confirmPaymentData));

            //send notification to courier
            Notification::send($confirmPaymentData->order->user , new ConfirmPaymentNotification($confirmPaymentData));

            FlashAlert::success('Konfirmasi Berhasil','Request Konfirmasi Pembayaran Order ID : '. $request->order_id.' berhasil'); 
            redirect()->back();
        }else{
            FlashAlert::warning('Order ID Tidak Ditemukan','Order ID : '. $request->order_id.' tidak ditemukan');
            redirect()->back();            
        }
        return redirect()->back();
    }

    //render admin confirm payment
    public function admin_confirmPaymentIndex(){
        $confirmPayments = $this->confirm_payment->paginate(8);
    	return view('admin.confirm_payment.confirm_payment',['confirmPayments' => $confirmPayments]);
    }

    public function admin_approve_payment(Request $request){
        //find confirm payment data
        $confirmPayment = $this->confirm_payment->find($request->confirmPayment_id);
        if($confirmPayment){
            //change checkout status to 2 - Sudah dibayar
            $confirmPayment->order->status_id = 2;
            $confirmPayment->order->save();
            return redirect()->back();            
        }else{
            return redirect()->back();
        }
    }
}
