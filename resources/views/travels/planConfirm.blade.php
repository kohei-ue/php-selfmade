<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/plan.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Plan Confirm</title>
</head>
<body class="plan_body">
    @include('layouts.header')
    <main class="plan_main">
        <div class="title">投稿内容確認</div>
        <form action="{{ route('travels.planConfirm_submit') }}" method="post" id="form" enctype="multipart/form-data" novalidate>
        @csrf
        <label for="title">プラン名</label>
        <input type="hidden" id="title" name="title" value="{{ $data['title'] }}">
        <p class="confirm_p">{{ $data['title'] }}</p>

        <label for="area">エリア</label>
        <input type="hidden" id="area" name="area" value="{{ $data['area'] }}">
        <p class="confirm_p">{{ $data['area'] }}</p>
            
        <label for="date">滞在日数</label>
        <input type="hidden" id="date" name="date" value="{{ $data['date'] }}">
        <p class="confirm_p">{{ $data['date'] }}</p>
           
        <label for="money">予算</label>
        <input type="hidden" id="money" name="money" value="{{ $data['money'] }}">
        <p class="confirm_p">{{ $data['money'] }}</p>

        <label for="traffic">主な移動手段</label>
        <input type="hidden" id="traffic" name="traffic" value="{{ $data['traffic'] }}">
        <p class="confirm_p">{{ $data['traffic'] }}</p>

        <label for="spot">主なスポット</label>
        @php
            $days = ['一日目', '二日目', '三日目', '四日目', '五日目', '六日目', '七日目'];
        @endphp
        @foreach($days as $index => $day)
            @if(isset($data['spot_day'.($index+1)]))
                <div class="confirm_spot">
                    <strong>{{ $day }}:</strong>
                    @foreach($data['spot_day'.($index+1)] as $key => $spot)
                        <span>{{ $spot }}</span>
                        @if($key < count($data['spot_day'.($index+1)])-1)
                            <span>→</span>
                        @endif
                    @endforeach
                </div>
            @endif
        @endforeach

        <label for="body">プラン紹介</label>
        <input type="hidden" id="body" name="body" value="{{ $data['body'] }}">
        <p class="confirm_p">{{ $data['body'] }}</p>

        <label for="image">写真</label>
        <input type="hidden" id="image" name="image">
        @if(isset($data['image']))
            <img id="preview" src="#" alt="Uploaded Image">
        @endif

        <input id="btn" type=submit name="submit" value="投稿">
        <input id="btn_back" type=button value="戻る" onclick="history.back(-1)">
        </form>
    </main>
    <script>
    window.onload = function() {
        const preview = document.getElementById('preview');
        const uploadedImage = sessionStorage.getItem('uploadedImage');
        if (uploadedImage) {
            preview.src = uploadedImage;
            preview.style.display = 'block';
        }
    }
    </script>
    @include('layouts.footer')
</body>
</html>