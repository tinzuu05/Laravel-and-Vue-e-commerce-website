@extends('layouts/nav_footer')

@section('css')
<link rel="stylesheet" href="./css/checkout.css">
@endsection

@section('content')
<div class="container">
    <h1>結帳頁</h1>
    <div>
        <table class="table table-Secondary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">商品名稱</th>
                    <th scope="col">單價</th>
                    <th scope="col">數量</th>
                    <th scope="col">價格</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cart_items as $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>{{$item->price * $item->quantity}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div>
        <h5 class='total'>總計:$ {{$total_price}}</h5>
    </div>

    <h3 class="info mb-2">收件人資訊</h3>
        <form>
            <div class="form-group">
            <label for="exampleInputEmail1">收件人姓名</label>
            <input type="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">連絡電話</label>
                <input type="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">地址</label>
                <input type="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">發票方式</label>
                <select class="form-select form-control" aria-label="Default select example">
                    <option selected disabled>請選擇</option>
                    <option value="1">三聯式統一發票</option>
                    <option value="2">二聯式統一發票</option>
                    <option value="3">電子發票</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">收貨時間</label>
                <input type="name" class="form-control">
            </div>

            <h3 class="info mt-5">付款信息</h3>
            <div class="padding">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header">
                                <strong>信用卡付款</strong>
                                <small>請輸入信用卡資訊</small>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="name">持卡人姓名</label>
                                            <input class="form-control" id="name" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="ccnumber">信用卡號碼</label>
                                            <div class="input-group">
                                                <input class="form-control" type="text" placeholder="0000 0000 0000 0000" autocomplete="email">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="mdi mdi-credit-card"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="ccmonth">月</label>
                                        <select class="form-control" id="ccmonth">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="ccyear">年</label>
                                        <select class="form-control" id="ccyear">
                                            <option>2014</option>
                                            <option>2015</option>
                                            <option>2016</option>
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                            <option>2022</option>
                                            <option>2023</option>
                                            <option>2024</option>
                                            <option>2025</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="cvv">CVV/CVC</label>
                                            <input class="form-control" id="cvv" type="text" placeholder="123">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-dark float-right" type="submit">
                                    <i class="mdi mdi-gamepad-circle"></i> 繼續</button>
                                <button class="btn btn-sm btn-danger" type="reset">
                                    <i class="mdi mdi-lock-reset"></i>重設</button>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="exampleInputEmail1">備註</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="15"></textarea>
                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark checkout" data-toggle="modal" data-target="#exampleModal">
                確認付款
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">謝謝您的光顧</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    付款已成功
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                    </div>
                </div>
                </div>
            </div>
        </form>
</div>
<div class="clear"></div>
@endsection

@section('js')
<script>

</script>
@endsection

