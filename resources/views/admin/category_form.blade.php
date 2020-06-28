@extends('admin.base.app')
@section('title' , 'Admin Category Form')
@section('content_title', 'Category Form')
@section('admin_category_menu' , 'active')
@section('content')
 <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Form Kategory</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ $categories ? route('adminCategoryEdit') : route('adminCategoryCreate') }}">
                	@csrf
                	@if($categories)
                	<input type="hidden" name="id" value="{{$categories->id}}" />
                	@endif
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nama Kategory</label>
                        <input name="category_name" type="text" class="form-control" placeholder="Masukkan Nama Kategory..." value="{{$categories ? $categories->category_name : null}}">
                      </div>
                    </div>
                  </div>
                  <div class="row" >
                    <div class="col-md-12 d-md-flex align-items-center justify-content-end text-center">
                    <a href="{{ route('adminCategory') }}" class="btn btn-round btn-primary" style="margin-right: 15px;">Kembali </a>
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