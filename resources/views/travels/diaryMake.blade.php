<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/diary.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Plan Make</title>
</head>
<body class="plan_body">
    @include('layouts.header')
    <main class="plan_main">
        <div class="title">旅日記作成</div>

        <form action="{{ route('travels.diaryMake_submit') }}" method="post" id="diaryMake_form" enctype="multipart/form-data" novalidate>
        @csrf
        <label for="date">日記題名</label>
        @if($errors->has('title'))
            <div class="error_text">{{ $errors->first('title') }}</div>
        @endif
        <input type="text" id="title" name="title" value="{{ old('title', $data['title'] ?? '') }}">

        <label for="date">行った場所</label>
        @if($errors->has('area'))
            <div class="error_text">{{ $errors->first('area') }}</div>
        @endif
        <input type="text" id="area2" name="area" value="{{ old('area', $data['area'] ?? '') }}">
            
        <label for="date">日程</label>
        @if($errors->has('date'))
            <div class="error_text">{{ $errors->first('date') }}</div>
        @endif
        <input type="date" id="start_date" name="start_date" value="{{ old('date', $data['date'] ?? '') }}" onchange="generateDiaryForms();">
        ～
        <input type="date" id="end_date" name="end_date" value="{{ old('date', $data['date'] ?? '') }}" onchange="generateDiaryForms();">

        <label for="body">日記</label>
        @if($errors->has('body'))
            <div class="error_text">{{ $errors->first('body') }}</div>
        @endif
        <div id="dynamic_diary_forms"></div>

        <label for="image">写真（写真を２枚添付します。）</label>
        <input type="file" id="image1" name="image1" onchange="previewImage(this, 'preview1');">
        <input type="file" id="image2" name="image2" onchange="previewImage(this, 'preview2');">
        <img id="preview1" src="{{ $data['image_path1'] ?? '' }}" alt="プレビュー画像1" style="max-width:200px; {{ isset($data['image_path1']) ? '' : 'display:none;' }}">
        <img id="preview2" src="{{ $data['image_path2'] ?? '' }}" alt="プレビュー画像2" style="max-width:200px; {{ isset($data['image_path2']) ? '' : 'display:none;' }}">

        <input id="btn" type=submit name="submit" value="投稿内容確認">
        </form>
    </main>
    <script>
    function generateDiaryForms() {
        const startDate = new Date(document.getElementById('start_date').value);
        const endDate = new Date(document.getElementById('end_date').value);
        const daysDifference = Math.floor((endDate - startDate) / (1000 * 60 * 60 * 24)) + 1;

        let diaryFormsHtml = '';

        for (let i = 1; i <= daysDifference; i++) {
            diaryFormsHtml += `
                <div>
                    <label>${i}日目：</label>
                    <input type="text" name="summary_day${i}">
                    <label>体験したことや感想：</label>
                    <textarea name="diary_day${i}" cols="30" rows="10"></textarea>
                </div>
            `;
        }

        document.getElementById('dynamic_diary_forms').innerHTML = diaryFormsHtml;
    }

    // 画像のプレビュー表示
    function previewImage(input) {
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            const previewId = input.id === "image1" ? "preview1" : "preview2";
            const preview = document.getElementById(previewId);
            preview.src = e.target.result;
            preview.style.display = 'block';
            sessionStorage.setItem(previewId, e.target.result);
        }

        reader.readAsDataURL(file);
    }
    </script>
    @include('layouts.footer')
</body>
</html>