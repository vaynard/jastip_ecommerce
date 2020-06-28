@extends('admin.base.app')
@section('title' , 'Admin Dashboard')
@section('content_title', 'Dashboard')
@section('admin_dashboard_menu' , 'active')
@section('content')
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"><a href="{{route('adminUser')}}">Lihat lebih detail</a></h5>
                <h4 class="card-title">Jumlah User Terdaftar</h4>
              </div>
              <div class="card-body">
                <div class="chart-area d-flex text-center justify-content-center align-items-center">                      
                      <span style="font-size: 125px">{{$count_user}}</span>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Update Terbaru
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"><a href="{{route('adminProduct')}}">Lihat lebih detail</a></h5>
                <h4 class="card-title">Jumlah Titipan Barang</h4>
              </div>
              <div class="card-body">
                <div class="chart-area d-flex text-center justify-content-center align-items-center">                      
                      <span style="font-size: 125px">{{$count_product}}</span>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Update Terbaru
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category"><a href="{{route('adminCheckout')}}">Lihat lebih detail</a></h5>
                <h4 class="card-title">Jumlah Penitipan Barang</h4>
              </div>
              <div class="card-body">
                <div class="chart-area d-flex text-center justify-content-center align-items-center">                      
                      <span style="font-size: 125px">{{$count_checkout}}</span>
                </div>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Update Terbaru
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category"><a href="{{route('adminConfirmPayment')}}">Lihat lebih detail</a></h5>
                <h4 class="card-title">Konfirmasi Pembayaran Terbaru</h4>
              </div>
              <div class="card-body ">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Order Id
                      </th>
                      <th>
                        Nama Bank
                      </th>
                      <th>
                        Atas Nama
                      </th>
                      <th class="text-right">
                        Tanggal Pesanan
                      </th>
                    </thead>
                    <tbody>
                      @if(!$confirm_payments->isEmpty())
                      @foreach($confirm_payments as $confirm_payment)
                      <tr>
                        <td>
                          <a href="{{route('adminCheckoutDetail',['id'=>$confirm_payment->order->id])}}">{{$confirm_payment->order->order_id}}
                            </a>
                        </td>
                        <td>
                          {{$confirm_payment->bank_name}}
                        </td>
                        <td>
                          {{$confirm_payment->account_name}}
                        </td>
                        <td class="text-right">
                          {{$confirm_payment->transfer_date}}
                        </td>
                      </tr>
                      @endforeach
                    @else
                      <tr>
                        <td colspan="4" class="text-center">
                          Data Kosong
                        </td>
                      </tr>
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category"><a href="{{route('adminProduct')}}">Lihat lebih detail</a></h5>
                <h4 class="card-title">Daftar Titipan Barang Terbaru</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Nama Product
                      </th>
                      <th>
                        Kurir
                      </th>
                      <th>
                        Tanggal Kedatangan
                      </th>
                      <th class="text-right">
                        Harga
                      </th>
                    </thead>
                    <tbody>
                      @if(!$products->isEmpty())
                      @foreach($products as $product)
                      <tr>
                        <td>
                          {{$product->product_name}}
                        </td>
                        <td>
                          {{$product->user->name}}
                        </td>
                        <td>
                          {{$product->arrival_date}}
                        </td>
                        <td class="text-right">
                          Rp.{{$product->product_price}}
                        </td>
                      </tr>
                      @endforeach
                    @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection