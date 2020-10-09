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
                            <small class="text-primary">尺寸{{$product->size}}</small>
                            <h3>{{$product->price}}元</h3>
                            {{$product->content}}
                            {{-- 我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容我是文章詳細內容 --}}
                        </div>

                    </div>
                </div>
            </div>
        </section>
@endsection


@section('js')
<!-- lightbox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
@endsection
