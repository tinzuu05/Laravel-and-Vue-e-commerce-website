@extends('layouts/nav_footer')

@section('css')
<style>
    .container {
        display: grid;
        grid-template-columns: 1fr 5fr;
    }
    .product_type li {
        list-style-type:none;
    }

    .product_type li a {
        color: gray;
    }

    .row {
        margin:
    }
</style>
@endsection

@section('content')
<section class="news">
    <h2 class="news_title m-5">最新商品</h2>
    <div class="container">
        <div>
            <div class="product_type">
                @foreach ($product_types as $product_type)
                <li>
                <a href="/product_type/{{$product_type->id}}">>{{$product_type->type_name}}</a>
                </li>

                @endforeach
            </div>
        </div>
        <div class="row">
@foreach ($product_types as $product_type)
            <div class="mb-3">
                <h1>{{$product_type->type_name}}</h1>
                <div class="row mb-3 row-cols-3">
                @foreach ($product_type->product as $product)
                {{-- {{$product}} --}}

                    <div class="card mb-3">
                        <img width="100%" src="{{$product->image_url}}" class="product_image_url" alt="product">
                        <div class="card-body">
                          <h5 class="product_title">{{$product->title}}</h5>
                          <small class="product_size text-primary">尺寸-{{$product->size}}</small>
                          <h5 class="price primary">{{$product->price}}元</h5>
                          <p class="content">{!!$product->content!!}</p>
                        <a href="/product_info/{{$product->id}}" class="btn btn-dark">商品詳情</a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
@endforeach


    {{-- @foreach ($product_list as $product)
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
    @endforeach --}}

        </div>

        {{-- {{$product_list->links('vendor.pagination.bootstrap-4')}} --}}
    </div>
</section>





@endsection

@section('js')

@endsection
