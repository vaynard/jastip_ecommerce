@extends('admin.base.app')
@section('title' , 'Konfirmasi Pembayaran')
@section('content_title', 'Konfirmasi Pembayaran')
@section('admin_confirm_payment_menu' , 'active')
@section('content')
<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Konfirmasi Pembayaran
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>Order ID</th>
                      <th>Nama Bank</th>
                      <th>Atas Nama</th>
                      <th>Nominal Transfer</th>
                      <th>Tanggal Pesanan</th>
                      <th>Bukti Transfer</th>
                      <th class="text-center">
                        Kelola
                      </th>
                    </thead>
                    <tbody>
                      @foreach($confirmPayments as $confirmPayment)
                      <tr>
                        <td>
                          <a href="{{route('adminCheckoutDetail' , ['id' =>$confirmPayment->order->order_id])}}">#{{$confirmPayment->order->order_id}}</a>
                        </td>
                        <td>
                          {{$confirmPayment->bank_name}}
                        </td>
                        <td>{{$confirmPayment->account_name}}</td>
                        <td>{{$confirmPayment->transfer_figure}}</td>
                        <td>{{$confirmPayment->created_at}}</td>
                        <td>
                          <a target="_blank" href="{{asset('transfer_figure_img/'. $confirmPayment->transfer_photo)}}">Lihat bukti transfer</a>
                        </td>
                        <td class="text-right">
                            @if($confirmPayment->order->status_id == 1)
                            <form method="POST" action="{{route('adminApprovePayment')}}">
                              @csrf
                              <input type="hidden" name="confirmPayment_id" value="{{$confirmPayment->id}}">
                              <button type='submit' class="btn btn-round btn-primary">Approve Pembayaran</button>
                            </form>
                            @endif
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="pagination__wrapper">
                    <ul class="pagination text-center justify-content-center">
                      {{ $confirmPayments->links() }}
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection