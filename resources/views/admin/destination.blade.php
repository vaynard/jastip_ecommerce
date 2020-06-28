@extends('admin.base.app')
@section('title' , 'Admin Destinasi')
@section('content_title', 'Destinasi')
@section('admin_destination_menu' , 'active')
@section('content')
<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Destinasi
                	<small class="pull-right">
                <button type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                  <a href="{{route('adminDestinationForm')}}"><i class="now-ui-icons ui-1_simple-add"></i></a>
                </button>           		
                	</small>
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>No</th>
                      <th>Nama Destinasi</th>
                      <th>Tanggal dibuat</th>
                      <th>Status Aktif</th>
                      <th class="text-right">
                        Kelola
                      </th>
                    </thead>
                    <tbody>
                      @foreach($destinations as $destination)
                      <tr>
                        <td>
                          {{$destination->id}}
                        </td>
                        <td>
                          {{$destination->destination_name}}
                        </td>
                        <td>
                          {{$destination->created_at}}
                        </td>
                        <td>
                          @if($destination->is_active)
                            Aktif
                          @else
                            Tidak Aktif
                          @endif
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                              <a href="{{route('adminDestinationForm' , ['id' =>$destination->id])}}"><i class="now-ui-icons ui-2_settings-90"></i></a>
                            </button>
                            <button type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                              <a href="{{route('adminDestinationDelete' , ['id' =>$destination->id])}}"><i class="now-ui-icons ui-1_simple-remove"></i></a>
                            </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="pagination__wrapper">
                    <ul class="pagination text-center justify-content-center">
                      {{ $destinations->links() }}
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection