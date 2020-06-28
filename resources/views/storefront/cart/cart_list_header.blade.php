@if(Cart::count() > 0)   
    <div class="dropdown-menu">
        <ul>
        	@foreach(Cart::content() as $cart)
            <li>
                <a href="{{route('productDetail' , ['id' =>$cart->id])}}">
                    <figure><img src="{{asset('storefront/img/product_placeholder.png')}}" data-src="{{ asset('productImage/'. $cart->options->image) }}" alt="" width="50" height="50" class="lazy"></figure>
                    <strong><span>{{$cart->qty}} x {{$cart->name}}</span>Rp. {{$cart->price}}</strong>
                </a>
                <a href="{{route('removeCart',['rowId' => $cart->rowId])}}" class="action"><i class="ti-trash"></i></a>
            </li>
            @endforeach
        </ul>
        <div class="total_drop">
            <div class="clearfix"><strong>Total</strong><span>Rp. {{Cart::total()}}</span></div>
            <a href="{{route('cart')}}" class="btn_1 outline">Lihat Keranjang</a>
            <a href="{{route('checkout')}}" class="btn_1">Checkout</a>
        </div>
    </div>
@else
    <div class="dropdown-menu">
        <ul>
            <br>
            <li class="text-center justify-content-center">
                Keranjang Anda kosong
            </li>
            <br>
        </ul>
    </div>
@endif