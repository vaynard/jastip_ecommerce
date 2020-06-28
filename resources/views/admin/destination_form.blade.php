@extends('admin.base.app')
@section('title' , 'Admin Destination Form')
@section('content_title', 'Destination Form')
@section('admin_destination_menu' , 'active')
@section('content')
 <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Form Destinasi</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ $destinations ? route('adminDestinationEdit') : route('adminDestinationCreate') }}">
                	@csrf
                	@if($destinations)
                	<input type="hidden" name="id" value="{{$destinations->id}}" />
                	@endif
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Destinasi</label>
                        <input name="destination_name" type="text" class="form-control" placeholder="Masukkan Nama Destinasi..." value="{{$destinations ? $destinations->destination_name : null}}">
                      </div>
                    </div>
                  </div>
                  <div class="row" >
                    <div class="col-md-12 d-md-flex align-items-center justify-content-end text-center">
                    <a href="{{ route('adminDestination') }}" class="btn btn-round btn-primary" style="margin-right: 15px;">Kembali </a>
                      <input class="btn btn-round btn-primary" type="submit" value="Simpan">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection