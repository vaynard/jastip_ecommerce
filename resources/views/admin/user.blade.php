@extends('admin.base.app')
@section('title' , 'Admin Users')
@section('content_title', 'Users')
@section('admin_user_menu' , 'active')
@section('content')
<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Data User</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>No</th>
                      <th>Nama</th>
                      <th>Email</th>
                      <th>Tanggal Mendaftar</th>
                      <th class="text-right">
                        Kelola
                      </th>
                    </thead>
                    <tbody>
                      @php $i = 1 @endphp
                      @foreach($users as $user)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>
                          <a target="_blank" href="{{asset('avatar/'. $user->avatar)}}"><img src="{{asset('avatar/'. $user->avatar)}}" onerror="this.src='{{asset("avatar/avatar_placeholder.jpg")}}'" class="lazy" alt="Image" style="height: 60px;width: 60px;"></a>
                          <span style="margin-left: 15px;">
                          {{$user->name}}</span>
                        </td>
                        <td>
                          {{$user->email}}
                        </td>
                        <td>
                          {{$user->created_at}}
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                              <a href="{{route('adminEditUser' , ['id' =>$user->id])}}"><i class="now-ui-icons ui-2_settings-90"></i></a>
                            </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="pagination__wrapper">
                    <ul class="pagination text-center justify-content-center">
                      {{ $users->links() }}
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection