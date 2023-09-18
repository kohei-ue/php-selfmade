<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/plan.css">
    <title>diary</title>
</head>
<body>
    @include('layouts.header')
    <main>
        <div class="title_diary">旅日記詳細</div>
        <div class="diary_container2">
            <div class="plan_content">
                <div class="plan_title">
                    {{ $diary->title }}
                </div>
                <div class="plan_maker">
                    作成者：{{ $diary->user->name }}さん
                </div>
                <div class="diary_area2">
                    行ったところ：{{ $diary->area }}
                </div>
                <div class="diary_date2">
                    日程：{{ date('Y年m月d年', strtotime($diary->start_date)) }} ～ {{ date('Y年m月d日', strtotime($diary->end_date)) }}
                </div>
                <div class="plan_body">
                    @php
                        $summary_days = explode(' ', trim($diary->summary_day));
                        $diary_days = explode(' ', trim($diary->diary_day));
                    @endphp

                    @for($i = 0; $i < count($summary_days); $i++)
                    <div class="day_section">
                        <div class="diary_summary">
                            {{ $i + 1 }}日目：{{ $summary_days[$i] }}
                        </div>
                        <div class="diary_body">
                            体験したことや感想：
                            <p>{{ $diary_days[$i] }}</p>
                        </div>
                    </div>
                    @endfor
                </div>
                <div class="diary_image">
                    <img id="preview1" src="{{ asset('storage/' . $diary->image1) }}" alt="{{ $diary->title }}">
                    <img id="preview2" src="{{ asset('storage/' . $diary->image2) }}" alt="{{ $diary->title }}">
                </div>
            </div>
        </div>
        <input id="btn_back" type=button value="戻る" onclick="history.back(-1)">
    </main>
    @include('layouts.footer')
</body>
</html>