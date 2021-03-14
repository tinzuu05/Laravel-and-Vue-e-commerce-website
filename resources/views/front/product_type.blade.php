@extends('layouts/nav_footer')

@section('css')

@endsection

@section('content')

<section class="news" style="margin-top: 100px;">
    <div class="container">
        <div class="title"><h1>產品分類頁</h1></div>
        <div class="lists">
            <div class="mb-3">
                {{-- {{$product_type}}
                {{$products}} --}}
            <h1>{{$product_type->type_name}}</h1>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="news_list">
                    <div><img src="{{$product->image_url}}" alt=""></div>
                    <p>{{$product->title}}</p>
                    <a class="btn btn-dark" href="/product_info/{{$product->id}}">查看更多</a>
                    </div>
                </div>
                @endforeach
            </div>
            </div>
        </div>
    </div>

</section>


@endsection

@section('js')

@endsection
