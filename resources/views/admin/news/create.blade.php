@extends('layouts/app')

@section('css')

@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">後臺</a></li>
      <li class="breadcrumb-item active" aria-current="page">最新消息管理</li>
      <li class="breadcrumb-item active" aria-current="page">新增最新消息</li>
    </ol>
  </nav>

<form method="POST" action="/admin/news/store" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">標題<small class="text-danger">(限制至多20字)</small></label>
        <input name="title" type="text" class="form-control" id="title" required>
    </div>
    <div class="form-group">
        <label for="sub_title">副標題</label>
        <input name="sub_title" type="text" class="form-control" id="sub_title" required>
    </div>
      <div class="form-group">
        <label for="image_url">上傳主要圖片<small class="text-danger">(建議圖片寬高比例為4比3)</small></label>
        <input name="image_url" type="file" class="form-control-file" id="image_url">
      </div>
      <div class="form-group">
        <label for="content">內容</label>
        <textarea name="content" class="form-control" id="content" rows="3" required></textarea>
      </div>
    <button type="submit" class="btn btn-primary">送出新增</button>
</form>

@endsection

@section('js')

@endsection
