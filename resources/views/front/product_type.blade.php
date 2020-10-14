@extends('layouts/nav_footer')

@section('css')

@endsection

@section('content')

<section class="news" style="margin-top: 100px;">
    <div class="container">
        <div class="title">產品分類頁</div>
        <div class="lists">
            <div class="mb-3">
                {{-- {{$product_type}}
                {{$products}} --}}
            <h1>{{$product_type->type_name}}</h1>
            <div class="row">
                @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="news_list">
                    <h3>{{$product->title}}</h3>
                    <a class="btn btn-primary" href="/product_info/{{$product->id}}">查看更多</a>
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
