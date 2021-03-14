@extends('layouts/nav_footer')

@section('css')
    <!-- page css -->
    <link rel="stylesheet" href="./css/contact.css">
@endsection

@section('content')
        <section class="contact">
            <div class="container">
                <h2 class="mt-5">聯絡我們</h2>
                <div class="contact_description">
                    歡迎您隨時向我們尋求幫助！
                    <ol>
                        <li>隨時傳送訊息給我們，我們將於 24 小時內回覆。</li>
                        <li>當您聯絡客服部門時，您的個人資料將根據我們的隱私權公告受到處理</li>
                        <li>如果尚未註冊，請輸入您的個人電子郵件信箱</li>
                    </ol>
                </div>
                <form method="POST" action="/store_contact" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">您的信箱</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">只做調查使用，並不會另作他用</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">您的居住地</label>
                        <select name="location" multiple class="form-control" id="exampleFormControlSelect2">
                          <option value="北台灣">北台灣</option>
                          <option value="中台灣">中台灣</option>
                          <option value="南臺灣">南臺灣</option>
                          <option value="東台灣">東台灣</option>
                          <option value="離島">離島</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">上傳照片</label>
                        <input name="image_url" type="file" class="form-control-file" id="exampleFormControlFile1">
                      </div>
                      <div class="form-group">
                        <label for="exampleInput">聯絡主題</label>
                        <input name="place_name" type="text" class="form-control" id="exampleInput" aria-describedby="title">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">詳情描述</label>
                        <textarea name="place_description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    <button type="submit" class="btn btn-dark">送出聯絡表</button>
                </form>
            </div>
        </section>
@endsection


