@extends('admin.base.app')
@section('title' , 'Admin Checkout')
@section('content_title', 'Checkout')
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
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Order ID</th>
                      <th>Penitip</th>
                      <th>Qty</th>
                      <th>Total Harga</th>
                      <th>Status</th>
                      <th>Tanggal Pesanan</th>
                      <th class="text-right">
                        Kelola
                      </th>
                    </thead>
                    <tbody>
                      @foreach($checkouts as $checkout)
                      <tr>
                        <td>
                          <a href="{{route('adminCheckoutDetail' , ['id' =>$checkout->id])}}">#{{$checkout->order_id}}</a>
                        </td>
                        <td>
                          {{$checkout->user->name}}
                        </td>
                        <td>{{$checkout->total_qty}}</td>
                        <td>{{$checkout->total_price}}</td>
                        <td>{{$checkout->status->status_name}}</td>
                        <td>
                          {{$checkout->created_at}}
                        </td>
                        <td class="text-right">
                           <a href="{{route('adminCheckoutDetail' , ['id' =>$checkout->id])}}"><button class="btn btn-round btn-primary">Detail</button></a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="pagination__wrapper">
                    <ul class="pagination text-center justify-content-center">
                      {{ $checkouts->links() }}
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection