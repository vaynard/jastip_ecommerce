@extends('admin.base.app')
@section('title' , 'Admin Category')
@section('content_title', 'Category')
@section('admin_category_menu' , 'active')
@section('content')
<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Kategori
                	<small class="pull-right">
                <button type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                  <a href="{{route('adminCategoryForm')}}"><i class="now-ui-icons ui-1_simple-add"></i></a>
                </button>           		
                	</small>
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>No</th>
                      <th>Nama Kategory</th>
                      <th>Tanggal dibuat</th>
                      <th>Status Aktif</th>
                      <th class="text-right">
                        Kelola
                      </th>
                    </thead>
                    <tbody>
                      @foreach($categories as $category)
                      <tr>
                        <td>
                          {{$category->id}}
                        </td>
                        <td>
                          {{$category->category_name}}
                        </td>
                        <td>
                          {{$category->created_at}}
                        </td>
                        <td>
                          @if($category->is_active)
                            Aktif
                          @else
                            Tidak Aktif
                          @endif
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                              <a href="{{route('adminCategoryForm' , ['id' =>$category->id])}}"><i class="now-ui-icons ui-2_settings-90"></i></a>
                            </button>
                            <button type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                              <a href="{{route('adminCategoryDelete' , ['id' =>$category->id])}}"><i class="now-ui-icons ui-1_simple-remove"></i></a>
                            </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="pagination__wrapper">
                    <ul class="pagination text-center justify-content-center">
                      {{ $categories->links() }}
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection