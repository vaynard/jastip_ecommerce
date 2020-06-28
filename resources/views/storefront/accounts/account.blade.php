@extends('storefront.accounts.base.account_base')
@section('title','Akun Saya')
@section('my-account-menu' , 'account-sidebar-menu-active')

<style type="text/css">
	.emp-profile{
    margin-bottom: 3%;
}
.profile-img{
    text-align: left;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #8A2BE2;
}
.profile-edit-btn{
    width: 100%;
}
.profile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.profile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #8A2BE2;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #8A2BE2;
}
.profile-tab-container{
	padding: 5%;
}

.review_content {
  margin-bottom: 30px;
}
.review_content h4 {
  font-size: 18px;
  font-size: 1.125rem;
}
.review_content .rating {
  color: #999;
  font-size: 12px;
  font-size: 0.75rem;
  margin-bottom: 0;
  float: left;
}
.review_content .rating i {
  width: 20px;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  -ms-border-radius: 3px;
  border-radius: 3px;
  height: 20px;
  font-size: 12px;
  font-size: 0.75rem;
  display: inline-block;
  background-color: #fec348;
  color: #fff;
  line-height: 20px;
  text-align: center;
  margin-right: 2px;
}
.review_content .rating i.empty {
  background-color: #ccc;
}
@media (max-width: 575px) {
  .review_content .rating {
    float: none;
    display: block;
  }
}
@media (max-width: 575px) {
  .review_content .rating em {
    float: none;
    display: inline-block;
    margin-left: 10px;
  }
}
.review_content em {
  font-weight: 500;
  color: #999;
  line-height: 22px;
  margin-left: 5px;
  float: right;
}
@media (max-width: 575px) {
  .review_content em {
    float: none;
    display: block;
    margin-top: 10px;
    margin-left: 0;
  }
}
</style>
@section('account_content')

        <div class="row justify-content-center">
            <div class="col-sm-5 col-md-4">
                <div class="profile-img">
                    <img src="{{asset('avatar/'.$curr_user->avatar)}}" alt=""/>
                </div>
            </div>
            <div class="col-sm-7 col-md-4">
                <div class="profile-head">
                    <h5>
                        {{$curr_user->name}}
                    </h5>
                    <h6>
                        {{$curr_user->email}}
                    </h6>
                    <p class="profile-rating">Rating : <span>{{$curr_user->reviewee->avg('rating')}}/5</span></p>
                    
                </div>
            </div>           
            <div class="col-md-2 col-sm-4">
				<a href="{{route('editAccount')}}"><button class="btn_1 profile-edit-btn">Edit Profile</button></a>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12 col-sm-12 profile-tab-container">
        		    <ul class="nav nav-tabs justify-content-end" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Review Tentang Saya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Social Media Saya</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tentang Saya</a>
                        </li>
                    </ul>
        	</div>
            <div class="col-md-12 col-sm-12">
                <div class="tab-content profile-tab" id="myTabContent">
                  <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                @if(!$curr_user->reviewee->isEmpty())
                                <div class="row justify-content-between">
                                    @foreach ($curr_user->reviewee as $review)
                                    <div class="col-lg-5">
                                        <div class="review_content">
                                            <div class="clearfix add_bottom_10">
                                                <span class="rating">
                                                    @if($review->rating >= 1)
                                                    <i class="icon-star"></i>
                                                    @else
                                                    <i class="icon-star-empty"></i>
                                                    @endif
                                                    @if($review->rating >= 2)
                                                    <i class="icon-star"></i>
                                                    @else
                                                    <i class="icon-star-empty"></i>
                                                    @endif
                                                    @if($review->rating >= 3)
                                                    <i class="icon-star"></i>
                                                    @else
                                                    <i class="icon-star-empty"></i>
                                                    @endif
                                                    @if($review->rating >= 4)
                                                    <i class="icon-star"></i>
                                                    @else
                                                    <i class="icon-star-empty"></i>
                                                    @endif
                                                    @if($review->rating >= 5)
                                                    <i class="icon-star"></i>
                                                    @else
                                                    <i class="icon-star-empty"></i>
                                                    @endif<em>{{$review->rating}}/5</em></span>
                                                <em>Di review {{$review->created_at}}</em>
                                            </div>
                                            <p>{{$review->review}}.</p>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div class="row">
                                    <div class="col-12 justify-content-center text-center">
                                        <span>Belum ada ulasan mengenai anda</span>
                                    </div>
                                </div>
                                @endif
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Line Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$curr_user->line_id ? $curr_user->line_id : 'Belum ditambahkan'}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Twitter Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$curr_user->twitter_id ? $curr_user->twitter_id : 'Belum ditambahkan'}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Instragram Id</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$curr_user->instagram_id ? $curr_user->instagram_id : 'Belum ditambahkan'}}</p>
                                    </div>
                                </div>
                    </div>
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$curr_user->name}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-6">
                                        @if($curr_user->gender == 1)
                                            <p>Pria</p>
                                        @elseif($curr_user->gender == 0)
                                            <p>Wanita</p>
                                        @else
                                            <p>Belum ditambahkan</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Email</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$curr_user->email}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Alamat Lengkap</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$curr_user->address}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Nomor Telepon</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$curr_user->phone_number}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Kota Tempat Tinggal</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{$curr_user->city}}</p>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
        </div>      
@endsection