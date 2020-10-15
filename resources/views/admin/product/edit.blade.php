@extends('layouts/app')

@section('css')

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">後臺</a></li>
      <li class="breadcrumb-item active" aria-current="page">產品管理</li>
      <li class="breadcrumb-item active" aria-current="page">編輯</li>
    </ol>
  </nav>

<form method="POST" action="/admin/product/update/{{$product->id}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="product_type_id">商品類別</label>
        <select class="form-control" name="product_type_id" id="product_type_id">
            @foreach ($product_types as $product_type)
        <option value="{{$product_type->id}}" @if($product_type->id ==$product->product_type_id) selected @endif>{{$product_type->type_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="title">標題<small class="text-danger">(限制至多20字)</small></label>
    <input name="title" type="text" class="form-control" id="title" value="{{$product->title}}" required>
    </div>
    <div class="form-group">
        <label for="size">尺寸</label>
        <input name="size" type="text" class="form-control" id="size" value="{{$product->size}}" required>
    </div>
    <div class="form-group">
        <label for="price">價格</label>
        <input name="price" type="number" class="form-control" id="price" value="{{$product->price}}" required>
    </div>
    <div class="form-group">
        <label for="image_url">原始主要圖片</label>
        <div><img src="{{$product->image_url}}" alt=""  style="width:200px"></div>
      </div>
    <div class="form-group">
        <label for="image_url">更新主要圖片<small class="text-danger">(建議圖片寬高比例為4比3)</small></label>
        <input name="image_url" type="file" class="form-control-file" id="image_url">
    </div>
    <div>
        多圖
        @foreach ($product->productImgs as $productImg)
            <img height="200" src="{{$productImg->img_url}}" alt="">
        @endforeach
    </div>
      <div class="form-group">
        <label for="content">產品內容</label>
        <textarea name="content" class="form-control" id="content" rows="3" required>{{$product->content}}</textarea>
      </div>
    <button type="submit" class="btn btn-primary">送出編輯</button>
</form>

@endsection

@section('js')

@endsection
