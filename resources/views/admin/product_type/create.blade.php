@extends('layouts/app')

@section('css')
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
      <li class="breadcrumb-item active" aria-current="page"><a href="/admin/product_type">產品類別管理</a></li>
      <li class="breadcrumb-item active" aria-current="page">新增</li>
    </ol>
  </nav>

<form method="POST" action="/admin/product_type" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="type_name">商品類別名稱</label>
        <input name="type_name" type="text" class="form-control" id="type_name" required>
    </div>
    <div class="form-group">
        <label for="sort">排序</label>
        <input name="sort" type="number" min="0" step="1" class="form-control" id="sort" value="0" required>
    </div>
    <button type="submit" class="btn btn-primary">新增</button>
</form>

@endsection

@section('js')
{{-- summerNote --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({

        });
    });
</script> --}}
@endsection
