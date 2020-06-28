
<div id="process-dialog{{$checkoutProduct->id}}" class="reply-dialog zoom-anim-dialog mfp-hide" style="max-height: 400px;">
    <div class="modal_header">
        <h3>Proses Order</h3>
    </div>
    <form method="POST" action="{{ route('checkoutStatusUpdate') }}">
        @csrf
        <div class="sign-in-wrapper">
            <div class="form-group">
            	<label>Order Id : <a href="{{route('myOrderDetail'  , ['id' =>$checkoutProduct->checkout->id])}}">{{$checkoutProduct->checkout->order_id}}</a></label>
                <a target="_blank" href="{{route('invoicePdf',['id' => $checkoutProduct->checkout->id])}}" style="float: right;" class="btn_1">Print Invoice</a>
                <br>
                <label>Penitip : {{$checkoutProduct->checkout->user->name}}</label><br>
                <label>Status Barang : {{$checkoutProduct->checkout->status->status_name}}</label><br>
            	<label>Nama Product : {{$checkoutProduct->product->product_name}}</label><br>
                <label>Jumlah Barang : {{$checkoutProduct->qty}}</label><br>
            	<label>Waktu Order : {{$checkoutProduct->created_at}}</label>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value="{{$checkoutProduct->id}}">
                <label for="status" >Update Status</label>
				<div class="custom-select-form">
					<select class="wide add_bottom_10" name="status" required id="status">
						<option value="" disabled selected>Pilih Status *</option>
						@foreach($checkoutStatus as $status)
							<option value="{{$status->id}}">{{$status->status_name}}</option>
						@endforeach
					</select>
				</div>
            </div>
            <div class="text-center">
                <input type="submit" value="Update Status" class="btn_1 full-width">
            </div>
        </div>
    </form>
    <!--form -->
</div>