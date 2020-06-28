@extends('admin.base.app')
@section('title' , 'Admin Review')
@section('content_title', 'Review')
@section('admin_review_menu' , 'active')
@section('content')
<div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Review
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>No.</th>
                      <th>Nama User</th>
                      <th>Reviewer</th>
                      <th>Rating</th>
                      <th>Review</th>
                      <th>Direview pada</th>
                      <th class="text-right">
                        Kelola
                      </th>
                    </thead>
                    <tbody>
                      @php $i = 1 @endphp
                      @foreach($reviews as $review)
                      <tr>
                        <td>
                          {{$i++}}
                        </td>
                        <td>{{$review->reviewee->name}}</span>
                        </td>
                        <td>
                          {{$review->reviewer->name}}
                        </td>
                        <td>
                          {{$review->rating}}/5
                        </td>
                        <td>
                        	{{$review->review}}
                        </td>
                        <td>
                        	{{$review->created_at}}
                        </td>
                        <td class="text-right">
                            <button type="button" class="btn btn-round btn-outline-default btn-simple btn-icon no-caret">
                              <a href="{{route('adminReviewDelete' , ['id' =>$review->id])}}"><i class="now-ui-icons ui-1_simple-remove"></i></a>
                            </button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="pagination__wrapper">
                    <ul class="pagination text-center justify-content-center">
                      {{ $reviews->links() }}
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection