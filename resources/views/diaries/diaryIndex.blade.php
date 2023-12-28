<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/diary.css">
    <title>旅日記一覧画面</title>
    <script src="https://kit.fontawesome.com/9292378248.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('layouts.header')
    <main>
        <div class="title_diary"><i class="fa-solid fa-book fa-spin fa-lg"></i> 旅日記</div>
        <a href="{{ route('diaries.diaryMake') }}" class="diary-button"><i class="fa-regular fa-pen-to-square"></i>旅日記を書く</a>
        @foreach($diaries as $diary)
        <div class="diary_container">
            <div class="plan_content">
                <a class="diary_title" href="{{ route('diaries.diaryDetail', ['id' => $diary->id]) }}">
                    {{ $diary->title }}
                </a>
                <div class="plan_maker">
                    作成者：{{ $diary->user->name }}さん
                </div>
                <div class="diary_area">
                    行ったところ：{{ $diary->area }}
                </div>
                <div class="diary_date">
                    日程：{{ $diary->start_date }} ～ {{ $diary->end_date }}
                </div>
            </div>
        </div>
        @endforeach
    </main>
    @include('layouts.footer')
</body>
</html>