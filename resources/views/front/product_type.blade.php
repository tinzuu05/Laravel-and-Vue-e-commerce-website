@extends('layouts/nav_footer')

@section('css')

@endsection

@section('content')

<section class="news" style="margin-top: 100px;">
    <div class="container">
        <div class="title">產品分類頁</div>
        <div class="lists">
            <div class="mb-3">
            <h1>{{$product_type->type_name}}</h1>
            <div class="row">
                {{-- @foreach ($collection as $item)

                @endforeach --}}
            </div>
            </div>
        </div>
    </div>

</section>


@endsection

@section('js')

@endsection
