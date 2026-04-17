<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    @unless (View::hasSection('no_header'))
    <header class="header">
        <div class="header-inner">
            <h1 class="header-title">FashionablyLate</h1>
            <div class="header-nav">
                <!-- ログインしている場合はログアウトボタンを表示 -->
                @auth
                <div class="header-nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-button">logout
                        </button>
                    </form>
                </div>
                @endauth
                <!-- ログインと登録画面の相互ボタン -->
                <div class="header-nav-item">
                    @if (Route::is('login'))
                    <button class="nav-button">
                        <a href="/register">register</a>
                    </button>
                    @elseif (Route::is('register'))
                    <button class="nav-button">
                        <a href="/login">Login</a>
                    </button>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </header>
    @endunless
    <main>
        @yield('contact')
    </main>
</body>

</html>