<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>全端電商網頁</title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    {{-- font awesome --}}
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'/>

    <!-- page css -->
    <link rel="stylesheet" href="./css/index.css">
    @yield('css')

</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="/">Elsa Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">首頁</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/news">即將上市</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/product">全館商品</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contact_us">聯絡我們</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <a href=""><i class="far fa-user-circle text-white mr-3"></i></a>
                <a href="/cart" class="icon-shopping-cart text-white">
                    <i class="fas fa-shopping-cart"></i>
                    <span id="cartTotalQuantity">
                        {{-- {{ \Cart::getTotalQuantity() }} 沒指定人的寫法 --}}
                        {{-- 指定對象的PHP原生寫法 --}}
                        @guest
                            0
                        @else
                        <?php
                            $userId = auth()->user()->id;
                            $cartTotalQuantity = \Cart::session($userId)->getTotalQuantity();
                            echo $cartTotalQuantity;
                        ?>
                        @endguest
                    </span>
                </a>
            </form>
        </div>
    </nav>

    <main role="main">
        @yield('content')
        <!-- 內容放此 -->
        <hr>
    </main>

    <footer class="container">
        <p>&copy; 此頁面僅用於全端電商網頁資料串接練習</p>
    </footer>


    <!-- bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>

    @yield('js')

    <!-- page js -->
    <script src="./js/index.js"></script>
</body>

</html>
