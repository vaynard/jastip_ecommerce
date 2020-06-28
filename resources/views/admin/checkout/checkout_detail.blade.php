@extends('admin.base.app')
@section('title' , 'Admin Checkout Detail')
@section('content_title', 'Checkout Detail')
@section('admin_checkout_menu' , 'active')
@section('content')
<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Checkout
                </h4>
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>
                          <p class="card-title">No Order : {{$checkout->order_id}}</p>
                        </td>
                        <td>
                          <p class="card-title">Penitip : {{$checkout->user->name}}</p>
                        </td>
                      </tr>
                      <tr>
                        <td>
                           <p class="card-title">Tanggal Transakasi : {{$checkout->status->created_at}}</p>
                        </td>
                        <td>
                          <p class="card-title">Status Pembayaran : {{$checkout->status->status_name >= 2 ? 'Sudah dibayar' : 'Pending'}}</p>
                        </td>
                      </tr>
                      <tr>
                        <td><p class="card-title">Status Order : {{$checkout->status->status_name}}</p></td>
                        <td>
                          <p class="card-title">Metode Pembayaran : Transfer Bank</p>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>No</th>
                      <th>Nama Product</th>
                      <th>Kurir</th>
                      <th>Tanggal Kedatangan</th>
                      <th>Qty</th>
                      <th class="text-right">Total Harga</th>
                    </thead>
                    <tbody>
                       @php $i = 1 @endphp
                      @foreach($checkout->checkoutProduct as $checkoutProduct)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>
                          <a target="_blank" href="{{asset('productImage/'. $checkoutProduct->product->product_image)}}"><img src="{{asset('productImage/'. $checkoutProduct->product->product_image)}}" onerror="this.src='{{asset("storefront/img/product_placeholder.png")}}'" class="lazy" alt="Image" style="height: 60px;width: 60px;"></a>
                          <span style="margin-left: 15px;">{{$checkoutProduct->product->product_name}}</span>
                          
                        </td>
                        <td>
                          {{$checkoutProduct->product->user->name}}
                        </td>
                        <td>{{$checkoutProduct->product->arrival_date}}</td>
                        <td>{{$checkoutProduct->qty}}</td>
                        <td class="text-right">Rp. {{$checkoutProduct->qty*$checkoutProduct->price}}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="row" style="margin-top: 15px;">
                     <div class="col-lg-4 col-sm-5">
                     </div>
                     <div class="col-lg-4 col-sm-5 ml-auto">
                        <div class="table-responsive">
                          <table class="table">
                              <tbody>
                                <tr>
                                  <td><strong class="text-dark">Subtotal</strong></td>
                                <td><td class="text-right">Rp. {{$checkout->total_price}}</td></td>
                                </tr>
                                <tr>
                                  <td><strong class="text-dark">Total</strong></td>
                                <td><td class="text-right">Rp. {{$checkout->total_price}}</td></td>
                                </tr>
                              </tbody>
                          </table>
                        </div>
                     </div>
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection