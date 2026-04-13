<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    @unless (View::hasSection('no_header'))
    <header class="header">
        <div class="header-inner">
            <h1 class="header-title">FashionablyLate</h1>
        </div>
    </header>
    @endunless
    <main>
        @yield('contact')
    </main>
</body>
</html>