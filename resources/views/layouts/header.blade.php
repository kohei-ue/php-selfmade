<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Irish+Grover&display=swap">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<header class="header">
    <div class="logo">
        <a href="{{ route('travels.index') }}">
            <img src="/image/Tabi Notes.jpg">
            <div class="header_text">Tabi Notes</div>
        </a>
    </div>

    <div class="hamburger-menu">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
    </div>

    <nav class="nav">
        <ul class="nav-box">
            <li><a href="{{ route('travels.planIndex') }}">プラン一覧</a></li>
            <li><a href="{{ route('travels.planMake') }}">プラン作成</a></li>
            <li><a href="{{ route('travels.diaryIndex') }}">旅日記</a></li>
        </ul>
    </nav>
    <div class="logout"><a href="{{ route('logout') }}">ログアウト</a></div>

    <script>
    $(function() {
        var lastScrollTop = 0;
        var headerHeight = $('.header').outerHeight();

        $(window).on('scroll', function() {
            var currentScrollTop = $(this).scrollTop();

            if (currentScrollTop > lastScrollTop && currentScrollTop > headerHeight) {
                // 下にスクロール
                $('.header').css('top', '-' + headerHeight + 'px');
            } else {
                // 上にスクロール
                $('.header').css('top', '0');
            }

            lastScrollTop = currentScrollTop;
        });
        
        $('.hamburger-menu').on('click', function(event) {
            event.stopPropagation(); // このイベントが親要素に伝播しないようにする

            if ($('header').hasClass('menu-active')) {
                $('header').removeClass('menu-active');
                $('.nav, .logout').hide();
            } else {
                $('header').addClass('menu-active');
                $('.nav, .logout').show();
            }
        });

        // メニュー以外の部分がクリックされたときの処理
        $(document).on('click', function() {
            if ($('header').hasClass('menu-active')) {
                $('header').removeClass('menu-active');
                $('.nav, .logout').hide();
            }
        });

        // メニュー自体がクリックされたとき、メニューを閉じないようにする
        $('.nav, .logout').on('click', function(event) {
            event.stopPropagation();
        });
    })
    </script>
</header>