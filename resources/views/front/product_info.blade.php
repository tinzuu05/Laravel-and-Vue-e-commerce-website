@extends('layouts/nav_footer')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">

    <!-- page css -->
    <link rel="stylesheet" href="./css/news_info.css">
@endsection

@section('content')
        <section class="product_info">
            <div class="container" style="margin-top: 60px">
                <div class="row">
                    <div class="col-12 my-3 my-md-0 col-md-6">
                        <div class="image_box h-100">
                            <a href="./images/index/news/news_example.JPG" data-lightbox="image-1" data-title="My caption">
                                <img width="100%" src="{{$product->image_url}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-12 my-3 my-md-0 col-md-6">
                        <div class="info_content">
                            <h2 class="product_title">{{$product->title}}</h2>
                           <div>產品類別：{{$product->product_type->type_name}}</div>
                            <small class="text-primary">尺寸{{$product->size}}</small>
                            <h3>{{$product->price}}元</h3>
                            {!!$product->content!!}
                            <button class="btn btn-danger addcart" data-productid="{{$product->id}}">加入購物車</button>
                        </div>

                    </div>
                </div>
            </div>
        </section>
@endsection


@section('js')
<!-- lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <script>
        $('.addcart').click(function () {
            var product_id = $(this).data('productid');

            $.ajaxSetup({
                headers: {
                    // 要與nav_footer.blade.php的meta csrf相呼應，不然會抓不到資料
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/addcart',
                data: {product_id:product_id},
                success: function (res) {
                    $('#cartTotalQuantity').text(res);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        });
    </script>
@endsection
