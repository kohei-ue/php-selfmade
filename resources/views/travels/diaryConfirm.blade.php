<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/plan.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>日記投稿</title>
</head>
<body class="plan_body">
    @include('layouts.header')
    <main class="plan_main">
        <div class="title">投稿内容確認</div>
        <form action="{{ route('travels.diaryConfirm_submit') }}" method="post" id="form" enctype="multipart/form-data" novalidate>
        @csrf
        <label for="title">日記題名</label>
        <input type="hidden" id="title" name="title" value="{{ $data['title'] }}">
        <p class="confirm_p">{{ $data['title'] }}</p>

        <label for="area">行った場所</label>
        <input type="hidden" id="area" name="area" value="{{ $data['area'] }}">
        <p class="confirm_p">{{ $data['area'] }}</p>
            
        <label for="date">滞在日程</label>
        <?php
            $start_date = date("Y年m月d日", strtotime($data['start_date']));
            $end_date = date("Y年m月d日", strtotime($data['end_date']));
        ?>
        <input type="hidden" id="date" name="date" value="{{ $data['start_date'] }} ~ {{ $data['end_date'] }}">
        <p class="confirm_p">日程: {{ $start_date }} ～ {{ $end_date }}</p>

        <?php
            $i = 1;
            while (isset($data['summary_day' . $i]) && isset($data['diary_day' . $i])) {
                echo '<label>' . $i . '日目：</label>';
                echo '<p class="confirm_p">' . $data['summary_day' . $i] . '</p>';
                echo '<label>体験したことや感想：</label>';
                echo '<p class="confirm_p">' . $data['diary_day' . $i] . '</p>';
                $i++;
            }
        ?>

        <label for="image">写真</label>
        <div class="diary-preview">
            <img id="preview1" src="{{ asset('storage/' . $data['image_path1']) }}" alt="Uploaded Image 1" style="max-width:200px;">
            <img id="preview2" src="{{ asset('storage/' . $data['image_path2']) }}" alt="Uploaded Image 2" style="max-width:200px;">
        </div>

        <input id="btn" type=submit name="submit" value="投稿">
        <input id="btn_back" type=button value="戻る" onclick="history.back(-1)">
        </form>
    </main>
    @include('layouts.footer')
</body>
</html>