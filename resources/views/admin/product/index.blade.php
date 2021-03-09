@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    @if(Session::has('update'))
    <div class="alert alert-success" role="alert">
        更新成功!
    </div>
    @endif
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">後臺</a></li>
      <li class="breadcrumb-item active" aria-current="page">產品管理</li>
    </ol>
  </nav>

  <a href="/admin/product/create" class="btn btn-success mb-3">新增產品</a>

  <table id="example" class="table table-striped table-bordered" style="width:100%">
    {{-- {{$news_list}} --}}
    <thead>
        <tr>
            <th>類別</th>
            <th>標題</th>
            <th>圖片</th>
            <th>尺寸</th>
            <th>價格</th>
            <th>排序</th>
            <th>最後修改時間</th>
            <th>產品內容</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product_list as $product)
        <tr>
            <td>
                @if($product->product_type)
                    {{$product->product_type->type_name}}
                @endif
            </td>
            <td>{{$product->title}}</td>
            {{-- 第一種顯示檔案的方式 --}}
            {{-- <td><img width="200" src="{{asset('/storage/'.$news->image_url)}}" alt=""></td> --}}

            {{-- 第二種顯示檔案方式 --}}
            <td><img width="200" src="{{$product->image_url}}" alt=""></td>
            <td>{{$product->size}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->sort}}</td>
            <td>{{$product->created_at}}</td>
        <td>
            <a href="product/edit/{{$product->id}}" class="btn btn-sm btn-primary">編輯</a>
            <button class="btn btn-danger btn-sm btn-delete" data-productid="{{$product->id}}">刪除</button>
            {{-- <a id="delete" href="news/destroy/{{$news->id}}" class="btn btn-sm btn-danger">刪除</a> --}}
        </td>
        </tr>
        @endforeach


    </tbody>
</table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#example').DataTable({"order": [[ 5, "desc" ]],
        language: {
            "processing":   "處理中...",
            "loadingRecords": "載入中...",
            "lengthMenu":   "顯示 _MENU_ 項結果",
            "zeroRecords":  "沒有符合的結果",
            "info":         "顯示第 _START_ 至 _END_ 項結果，共 _TOTAL_ 項",
            "infoEmpty":    "顯示第 0 至 0 項結果，共 0 項",
            "infoFiltered": "(從 _MAX_ 項結果中過濾)",
            "infoPostFix":  "",
            "search":       "搜尋:",
            "paginate": {
                "first":    "第一頁",
                "previous": "上一頁",
                "next":     "下一頁",
                "last":     "最後一頁"
            },
            "aria": {
                "sortAscending":  ": 升冪排列",
                "sortDescending": ": 降冪排列"
            }
        }
    });

        $('#example').on("click", ".btn-delete", function(){
            var product_id = this.dataset.productid;
            var r = confirm("你確定要刪除此筆資料?");
            if (r == true) {
                window.location.href = `/admin/product/destroy/${product_id}`
            }
        });
            } );

    </script>

@endsection
