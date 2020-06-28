@extends('admin.base.app')
@section('title' , 'Admin Product')
@section('content_title', 'Product')
@section('admin_product_menu' , 'active')
@section('content')
<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Product
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>No.</th>
                      <th>Nama Product</th>
                      <th>Kurir</th>
                      <th>Status Aktif</th>
                      <th class="text-right">
                        Kelola
                      </th>
                    </thead>
                    <tbody>
                      @php $i = 1 @endphp
                      @foreach($products as $product)
                      <tr>
                        <td>
                          {{$i++}}
                        </td>
                        <td>
                           <a target="_blank" href="{{asset('productImage/'. $product->product_image)}}"><img src="{{asset('productImage/'. $product->product_image)}}" onerror="this.src='{{asset("storefront/img/product_placeholder.png")}}'" class="lazy" alt="Image" style="height: 60px;width: 60px;"></a>
                          <span style="margin-left: 15px;">{{$product->product_name}}</span>
                        </td>
                        <td>
                          {{$product->user->name}}
                        </td>
                        <td>
                          @if($product->is_active)
                            Aktif
                          @else
                            Tidak Aktif
                          @endif
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                              <a href="{{route('adminDeleteProduct' , ['id' =>$product->id])}}"><i class="now-ui-icons ui-1_simple-remove"></i></a>
                            </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="pagination__wrapper">
                    <ul class="pagination text-center justify-content-center">
                      {{ $products->links() }}
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection