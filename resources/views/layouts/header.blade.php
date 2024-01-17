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
            <img src="/image/tabinotes.gif">
            <div class="header_text">Tabi Notes</div>
        </a>
    </div>

    <button class="hamburger-menu">
        <span class="bar bar-1"></span>
        <span class="bar bar-2"></span>
        <span class="bar bar-3"></span>
    </button>

    <nav class="nav">
        <ul class="nav-box">
            <li><a href="{{ route('travels.planIndex') }}">プラン一覧</a></li>
            <li><a href="{{ route('travels.planMake') }}">プラン作成</a></li>
            <li><a href="{{ route('diaries.diaryIndex') }}">旅日記</a></li>
            <li><a href="{{ route('extras.board') }}">掲示板</a></li>
            <li class="right-nav">
                @if(Auth::check())
                <li class="to_userInfo">
                    <a href="{{ route('users.userInfo', ['user_id' => Auth::user()->id]) }}">アカウント情報</a>
                </li>
                @endif
                <li class="logout"><a href="{{ route('logout') }}">ログアウト</a></li>
            </li>
        </ul>
    </nav>

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

        $(document).ready(function() {
            $('.hamburger-menu').click(function() {
                $(this).toggleClass('change');
                $('.nav').slideToggle();
            });
        });

        $(document).ready(function() {
            $(".hamburger-menu").click(function() {
                $(".bar").toggleClass(function () {
                return $(this).is('.open, .close') ? 'open close' : 'open';
                });
            });
        });

        $(window).resize(function() {
            var windowWidth = $(window).width();
            // ブレークポイント
            var breakpoint = 768;

            // ウィンドウ幅がブレークポイント以上の場合、.navを表示
            if (windowWidth >= breakpoint) {
                $('.nav').css('display', 'block');
            } else {
                // ウィンドウ幅がブレークポイント未満の場合、.navを非表示
                $('.nav').css('display', 'none');
            }
        });

        // ページ読み込み時
        $(document).ready(function() {
            $(window).resize();
        });
    })
    </script>
</header>