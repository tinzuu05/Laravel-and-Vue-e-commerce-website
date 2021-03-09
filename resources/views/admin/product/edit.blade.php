@extends('layouts/app')

@section('css')
{{-- summerNote --}}
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<style>
    .imgs {
        display: inline-block;
        position: relative;
    }

    .cancel_btn {
        position: absolute;
        right: -15px;
        top: -15px;
        z-index: 10;
        padding:9px 15px;
        background: red;
        border-radius: 50%;
        color: white;
    }
</style>
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
        <label for="product_image">
            內頁多張圖片
            <small class="text-danger">(建議圖片寬高比例為4比3)</small>
        </label>
        <div class="form-group">
            @foreach ($product->productImgs as $productImg)
                <div class="imgs">
                    <div class="cancel_btn" data-id="{{$productImg->id}}">X</div>
                    <img height="200" src="{{$productImg->img_url}}" alt="">
                    <input class="form-control img_sort" type="number" data-id="{{$productImg->id}}"  value="{{$productImg->sort}}">
                </div>
            @endforeach
        </div>
    </div>
      <div class="form-group">
        <label for="content">產品內容</label>
        <textarea name="content" class="form-control" id="content" rows="3" required>{{$product->content}}</textarea>
      </div>
    <button type="submit" class="btn btn-primary">送出編輯</button>
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

        //多圖片刪除
        $('.cancel_btn').click(function(){
            var img_id = $(this).data('id');
            //紀錄this
            var btn = $(this);

            console.log(img_id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/admin/ajax_delete_multi_img',
                data: {'id':img_id},
                success: function (img) {
                    btn.parent().addClass('d-none')
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        })

        $('.img_sort').change(function(){
            // 抓圖片id
            var img_id = $(this).data('id');
            // 抓input的值
            var value = $(this).val();

            console.log(img_id,value)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: '/admin/ajax_sort_multi_img',
                data: {
                    'id':img_id,
                    'value':value,
                },
                success: function (img) {
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        })
   });
</script>
@endsection
