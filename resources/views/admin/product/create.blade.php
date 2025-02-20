@extends('layouts/app')

@section('css')
{{-- summerNote --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">後臺</a></li>
      <li class="breadcrumb-item active" aria-current="page">產品管理</li>
      <li class="breadcrumb-item active" aria-current="page">新增產品</li>
    </ol>
  </nav>

<form method="POST" action="/admin/product/store" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="product_type_id">商品類別</label>
        <select class="form-control" name="product_type_id" id="product_type_id">
            @foreach ($product_types as $product_type)
        <option value="{{$product_type->id}}">{{$product_type->type_name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="title">標題<small class="text-danger">(限制至多20字)</small></label>
        <input name="title" type="text" class="form-control" id="title" required>
    </div>
    <div class="form-group">
        <label for="size">尺寸</label>
        <input name="size" type="text" class="form-control" id="size" required>
    </div>
    <div class="form-group">
        <label for="price">價格</label>
        <input name="price" type="number" class="form-control" id="price" required>
    </div>
    <div class="form-group">
        <label for="amount">數量</label>
        <input name="amount" type="number" class="form-control" id="amount" required>
    </div>
      <div class="form-group">
        <label for="image_url">上傳主要圖片<small class="text-danger">(建議圖片寬高比例為4比3)</small></label>
        <input name="image_url" type="file" class="form-control-file" id="image_url">
      </div>
      <div class="form-group">
        <label for="multiple_images">內頁多張圖片<small class="text-danger">(建議圖片寬高比例為4比3)</small></label>
        <input name="multiple_images[]" type="file" class="form-control-file" id="multiple_images" multiple required>
      </div>
      <div class="form-group">
        <label for="content">產品內容</label>
        {{-- <textarea name="content" id="content" required></textarea> --}}
        <textarea name="content" class="form-control" id="content" rows="3" required></textarea>
      </div>
    <button type="submit" class="btn btn-primary">送出新增</button>
</form>

@endsection

@section('js')
{{-- summerNote --}}
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#content').summernote({
            callbacks: {
                onImageUpload: function(files) {
                    for(let i=0; i < files.length; i++) {
                        $.upload(files[i]);
                    }
                },
                onMediaDelete : function(target) {
                    $.delete(target[0].getAttribute("src"));
                }
            },
        });


        $.upload = function (file) {
            let out = new FormData();
            out.append('file', file, file.name);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/admin/ajax_upload_img',
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function (img) {
                    $('#content').summernote('insertImage', img);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };

        $.delete = function (file_link) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/admin/ajax_delete_img',
                data: {file_link:file_link},
                success: function (img) {
                    console.log("delete:",img);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        }
   });
</script>
@endsection

