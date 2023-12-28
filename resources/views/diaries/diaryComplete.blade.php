<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/diary.css">
    <title>日記投稿完了</title>
</head>
<body>
    @include('layouts.header')
<main class="comp_main">
    <div class="title">投稿成功</div>
    <form id="form">
        <div class="complete-box">
            <p>日記を作成しました。<br>下のボタンを押してトップページに戻ることができます。</p>
            <a class="to_topPage" href="{{ route('travels.index') }}">
                トップページへ
            </a>

            <a class="to_diaryPage" href="{{ route('diaries.diaryIndex') }}">
                旅日記一覧へ
            </a>
        </div>
    </form>
</main>
    @include('layouts.footer')
</body>
</html>