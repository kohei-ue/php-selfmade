<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/plan.css">
    <title>Plan Complete</title>
</head>
<body>
    @include('layouts.header')
<main class="comp_main">
    <div class="title">投稿完了</div>
    <form id="form">
    <div class="complete-box">
            <p>プランを作成しました。<br>下のボタンを押してトップページに戻ることができます。</p>

                <a href="{{ route('travels.index') }}">
                    <div class="to_toppage">
                        <p>トップページへ</p>
                    </div>
                </a>

    </div>
    </form>
</main>
    @include('layouts.footer')
</body>
</html>