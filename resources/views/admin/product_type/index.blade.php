@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/admin">後臺</a></li>
      <li class="breadcrumb-item active" aria-current="page">產品類別管理</li>
    </ol>
  </nav>

  <a href="/admin/product_type/create" class="btn btn-success mb-3">新增產品類別</a>

  <table id="example" class="table table-striped table-bordered" style="width:100%">
    {{-- {{$news_list}} --}}
    <thead>
        <tr>
            <th>類別名稱</th>
            <th>排序</th>
            <th width="80">功能</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($product_types as $product_type)
        <tr>
            <td>{{$product_type->type_name}}</td>
            <td>{{$product_type->sort}}</td>
            <td>
                <a href="/admin/product_type/{{$product_type->id}}/edit" class="btn btn-sm btn-primary">編輯</a>
                <button class="btn btn-danger btn-sm btn-delete m-0" data-ptid="{{$product_type->id}}">刪除</button>
                <form id="delete-form-{{$product_type->id}}" action="/admin/product_type/{{$product_type->id}}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
        $('#example').DataTable({"order": [[ 1, "desc" ]],
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

        $("#example").on("click", ".btn-delete", function(){
            var product_type_id = this.dataset.ptid;

            // console.log(product_type_id);
            // console.log($('#delete-form-'+product_type_id));

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!如果刪除該類別，旗下產品也會一率刪除",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-form-'+product_type_id).submit();
                }
             })
            });
        });

    </script>

@endsection
