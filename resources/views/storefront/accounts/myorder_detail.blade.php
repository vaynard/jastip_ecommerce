@extends('storefront.accounts.base.account_base')
@section('title','Detail Order Saya')
@section('my-order-menu' , 'account-sidebar-menu-active')
<link href="{{ asset('storefront/css/cart.css') }}" rel="stylesheet">
<link href="{{ asset('storefront/css/progress_bar.css') }}" rel="stylesheet">
<style type="text/css">
.add-product-btn{
	float: right;
	margin-bottom: 20px;
}
</style>
@section('account_content')
		<div class="row">
			<div class="col-12 padding">
     <div class="card">
         <div class="card-body">
             <div class="row mb-4">
                 <div class="col-sm-6">
                     <div><a target="_blank" href="{{route('invoicePdf',['id' => $order->id])}}"><button class="btn_1 profile-edit-btn">Print Invoice</button></a></div>
                 </div>
                 <div class="col-sm-6 text-right">
                     <h4 class="mb-3">Detail Order Titipan</h4>
                     <div><span>No Order : {{$order->order_id}}</span> </div>
                     <div><span>Penitip : {{$order->user->name}}</span> </div>
                     <div>Tanggal Transaksi : {{$order->created_at}}</div>
                     <div>Status Pembayaran : {{$order->status->status_name >= 2 ? 'Sudah dibayar' : 'Pending'}}</div>
                     <div>Status Order : {{$order->status->status_name}}</div>
                     <div>Metode Pembayaran : Transfer Bank</div>
                 </div>
             </div>
             @foreach($products as $productArr)
             <div class="table-responsive-sm">
                 <table class="table table-striped">
                     <thead>
                         <tr>
                             <th colspan=4 class="center">Kurir : {{$productArr['name']}}</th>
                             <th colspan=2 class="text-right"><a href="{{route('review',['id' => $productArr['user_id']])}}"><button class="btn_1 profile-edit-btn">Tulis Ulasan</button></a>
                             </th>
                         </tr>
                         <tr>
                             <th class="center">#</th>
                             <th>Barang</th>
                             <th>Tanggal Kedatangan</th>
                             <th class="right">Price</th>
                             <th class="center">Qty</th>
                             <th class="text-right">Total</th>
                         </tr>
                     </thead>
                     <tbody>
                        @php $i = 1 @endphp
             			@foreach($productArr['product'] as $product)
                         <tr>
                             <td class="center">{{$i++}}</td>
                             <td class="left strong">{{$product->product_name}}</td>
                             <td>{{$product->arrival_date}}</td>
                             <td class="right">Rp. {{$product->checkout_price}}</td>
                             <td class="center">{{$product->checkout_qty}}</td>
                             <td class="text-right">Rp. {{$product->checkout_qty*$product->checkout_price}}</td>
                         </tr>
                 		@endforeach
                     </tbody>
                 </table>
             </div>

             <div class="row">
                 <div class="col-lg-12 col-sm-12">
					<table class="table table-clear">
                         <tbody>
                             <tr>
                                 <td class="text-center">
                                     <strong class="text-dark text-center">Status Transaksi</strong>
                                 </td>
                             </tr>
                         </tbody>
                     </table>               	
                 </div>
             </div>

            <div class="row bs-wizard" style="border-bottom:0;">
                <div class="col-3 bs-wizard-step {{$order->status_id >= 2 ? 'complete' : 'active'}}">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Sedang di Proses<br>{{
                    $order->status_id >=2 ? '(Sudah dibayar)' : ''
                  }}</div>
                </div>
                
                <div class="col-3 bs-wizard-step @if($order->status_id > 3)complete @elseif($order->status_id == 3) active else '' @endif"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Sudah sampai di Kota Kurir</div>
                </div>
                
                <div class="col-3 bs-wizard-step @if($order->status_id > 4)complete @elseif($order->status_id == 4) active else '' @endif"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Dalam Pengiriman</div>
                </div>
                
                <div class="col-3 bs-wizard-step {{$order->status_id == 5 ? 'complete' : ''}}"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Terkirim</div>
                </div>
            </div>
         	@endforeach
            <div class="row" style="margin-top: 15px;">
                 <div class="col-lg-4 col-sm-5">
                 </div>
                 <div class="col-lg-4 col-sm-5 ml-auto">
                     <table class="table table-clear">
                         <tbody>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Subtotal</strong>
                                 </td>
                                 <td class="text-right">Rp. {{$order->total_price}}</td>
                             </tr>
                             <tr>
                                 <td class="left">
                                     <strong class="text-dark">Total</strong> </td>
                                 <td class="text-right">
                                     <strong class="text-dark">Rp. {{$order->total_price}}</strong>
                                 </td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
         <div class="card-footer bg-white">
		

        
        
        
        
         </div>
     </div>
 </div>
		</div>
@endsection