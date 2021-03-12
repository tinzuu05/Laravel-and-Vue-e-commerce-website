@extends('layouts/nav_footer')

@section('css')
{{-- <link rel="stylesheet" href="./css/cart.css"> --}}
@endsection

@section('content')
<div id="app">
    <section class="news">
        <div class="container">
            <cart-component :items="{{$cart_items}}"></cart-component>
        </div>
    </section>
    {{-- <section class="news">
        <div class="container">
            @foreach ($cart_items as $item)
                <cart-component :item="{{$item}}"></cart-component>
            @endforeach
            <div>總金額</div>
        </div>
    </section> --}}
    {{-- <example-component></example-component>
    <cart-component></cart-component> --}}
</div>

        {{-- <example-component></example-component>
</div> --}}
{{-- <section class="news"> --}}
    {{-- <div class="container">
        {{$cart_items}}
        <div class="Cart">
            <div class="Cart__header">
              <div class="Cart__headerGrid">商品</div>
              <div class="Cart__headerGrid">單價</div>
              <div class="Cart__headerGrid">數量</div>
              <div class="Cart__headerGrid">小計</div>
              <div class="Cart__headerGrid">刪除</div>
            </div>
            @foreach ($cart_items as $item)
                <div class="Cart__product">
                    <div class="Cart__productGrid Cart__productImg"><img width="100%" height="100%" src="{{$item->attributes->image}}" alt=""></div>
                    <div class="Cart__productGrid Cart__productTitle">
                        {{$item->name}}
                    </div>
                    <div class="Cart__productGrid Cart__productPrice">{{$item->price}}</div>
                    <div class="Cart__productGrid Cart__productQuantity">
                        <input class="form-control product_qty" data-productid="{{$item->id}}" type="number" min="0" step="1" value="{{$item->quantity}}">
                    </div>
                    <div class="Cart__productGrid Cart__productTotal">{{$item->price * $item->quantity}}</div>
                    <div class="Cart__productGrid Cart__productDel">&times;</div>
                </div>
            @endforeach
        </div>
    </div> --}}
{{-- </section> --}}


@endsection

@section('js')
{{-- <script src="{{mix('/js/app.js')}}"></script> --}}
<script src="{{ asset('js/app.js') }}"></script>
<script>
    // $('.product_qty').on('change', function() {
    //     // console.log("onchangeValue:",this.value);
    //     // console.log("onchangeProductID:",this.getAttribute("data-productid"));
    //     var new_qty = this.value;
    //     var product_id = this.getAttribute("data-productid");

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });

    //     $.ajax({
    //         method: 'POST',
    //         url: '/changeProductQty',
    //         data: {
    //             product_id:product_id,
    //             new_qty:new_qty
    //         },
    //         success: function (res) {
    //             document.location.reload(true);
    //         },
    //         error: function (jqXHR, textStatus, errorThrown) {
    //             console.error(textStatus + " " + errorThrown);
    //         }
    //     });
    // });
</script>
@endsection
