@section('styles')
@if(session()->has('flashalert'))
<link href="{{ asset('storefront/css/sweetalert.min.css') }}" rel="stylesheet">
@endif
@endsection

@section('scripts')
@if(session()->has('flashalert'))
<script src="{{ asset('storefront/js/sweetalert.min.js') }}"></script>


<script>
swal({
    title: "{{session('flashalert.title')}}",
    text: "{{session('flashalert.message')}}",
    type: "{{session('flashalert.level')}}",
    timer: "{{config('flashalert.hide_timer')}}",
    showConfirmButton: "{{config('flashalert.show_confirmation_button')}}"
}).then(function(){
	{{Session::forget('flashalert')}};
});
</script>
@endif

@endsection
