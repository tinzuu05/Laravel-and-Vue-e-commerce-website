@extends('layouts/app')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">後臺</a></li>
      <li class="breadcrumb-item active" aria-current="page">最新消息管理</li>
    </ol>
  </nav>

  <a href="/admin/news/create" class="btn btn-success mb-3">新增最新消息</a>

  <table id="example" class="table table-striped table-bordered" style="width:100%">
    {{-- {{$news_list}} --}}
    <thead>
        <tr>
            <th>標題</th>
            <th>圖片</th>
            <th>副標題</th>
            <th>created_at</th>
            <th>功能</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($news_list as $news)
        <tr>
            <td>{{$news->title}}</td>
            {{-- 第一種顯示檔案的方式 --}}
            {{-- <td><img width="200" src="{{asset('/storage/'.$news->image_url)}}" alt=""></td> --}}

            {{-- 第二種顯示檔案方式 --}}
            <td><img width="150" src="{{$news->image_url}}" alt=""></td>
            <td>{{$news->sub_title}}</td>
            <td>{{$news->created_at}}</td>
        <td>
            <a href="news/edit/{{$news->id}}" class="btn btn-sm btn-primary">編輯</a>
            <button class="btn btn-danger btn-sm btn-delete m-0" data-newsid="{{$news->id}}">刪除</button>
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
        $('#example').DataTable();
        $('#example').on("click", ".btn-delete", function(){
            var news_id = this.dataset.newsid;
            var r = confirm("你確定要刪除此筆資料?");
            if (r == true) {
                window.location.href = `/admin/news/destroy/${news_id}`
            }
        });
            } );

    </script>

@endsection
