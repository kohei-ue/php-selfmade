<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Irish+Grover&display=swap">
</head>

<header class="header">
    <div class="logo">
        <a>
            <img src="/image/tabinotes.gif">
            <div class="header_text">Tabi Notes</div>
        </a>
    </div>

    <div class="logout_admin"><a href="{{ route('logout') }}">ログアウト</a></div>
</header>