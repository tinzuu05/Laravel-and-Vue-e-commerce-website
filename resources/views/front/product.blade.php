@extends('layouts/nav_footer')

@section('css')

@endsection

@section('content')
<section class="news">
    <div class="container">
        <h2 class="news_title mt-5 mb-5">最新商品</h2>
        <div class="row row-cols-1 row-cols-md-3">


    @foreach ($product_list as $product)
            <div class="col mb-4">
                <div class="card">
                    <img width="100%" src="{{$product->image_url}}" class="product_image_url" alt="product">
                    <div class="card-body">
                      <h5 class="product_title">{{$product->title}}</h5>
                      <small class="product_size text-primary">尺寸-{{$product->size}}</small>
                      <h5 class="price primary">{{$product->price}}元</h5>
                      <p class="content">{{$product->content}}</p>
                    <a href="/product_info/{{$product->id}}" class="btn btn-primary">商品詳情</a>
                    </div>
                </div>
            </div>
    @endforeach

        </div>

        {{$product_list->links('vendor.pagination.bootstrap-4')}}
    </div>
</section>





@endsection

@section('js')

@endsection
