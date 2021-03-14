@extends('layouts/nav_footer')

@section('css')
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
@endsection

@section('content')
        <section class="banner">
            <div class="swiper-container banner-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img width="100%" src="https://images.unsplash.com/photo-1558769132-cb1aea458c5e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=667&q=80" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img width="100%" src="https://images.unsplash.com/photo-1445205170230-053b83016050?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTd8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img width="100%" src="https://images.unsplash.com/photo-1525562723836-dca67a71d5f1?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NTB8fGNsb3RoZXN8ZW58MHx8MHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img width="100%" src="https://images.unsplash.com/photo-1610555772336-8f5af4a2098c?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mjd8fGRyZXNzfGVufDB8MHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img width="100%" src="https://images.unsplash.com/photo-1569748079281-dc67c9569015?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NXx8ZHJlc3MlMjBzaG9wfGVufDB8MHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img width="100%" src="https://images.unsplash.com/photo-1562347174-7370ad83dc47?ixid=MXwxMjA3fDB8MHxzZWFyY2h8OXx8ZHJlc3MlMjBzaG9wfGVufDB8MHwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
                    </div>
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next banner-button-next"></div>
                <div class="swiper-button-prev banner-button-prev"></div>
            </div>
        </section>

        <section class="news">
            <div class="container">
                <h2 class="news_title">即將上市</h2>
                {{-- {{$news_list}} --}}
                <div class="row news_lists">

                    @foreach ($news_list as $news)
                    <div class="col-md-4">
                        <div class="news_list">
                        <h3>{{$news->title}}</h3>
                            <h4>{{$news->sub_title}}</h4>
                            <img width="100%" src="{{$news->image_url}}" alt="圖片建議尺寸: 1000 x 567">
                            <p class="news_content">{{$news->content}}</p>
                            <a class="btn btn-dark" href="/news_info/{{$news->id}}" role="button">了解更多 &raquo;</a>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
@endsection

@section('js')
    <!-- swiper -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
@endsection

