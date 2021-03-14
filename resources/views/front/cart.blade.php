@extends('layouts/nav_footer')

@section('css')
<style>
    .checkout {
        margin-top: 10px;
        clear: both;
        float: right;
    }
</style>
@endsection

@section('content')
<div id="app">
    <section class="news">
        <div class="container">
            <cart-component :items="{{$cart_items}}"></cart-component>
            <div class="checkout"><a href="/checkout" class="text-center btn btn-dark">前往結帳頁</a></div>
        </div>
    </section>
</div>

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
