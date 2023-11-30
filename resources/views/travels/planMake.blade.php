<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/plan.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Plan Make</title>
</head>
<body class="plan_body">
            @if(Auth::user()->role == 0)
                @include('layouts.admin_header')
            @else
                @include('layouts.header')
            @endif
    <main class="plan_main">
        <div class="title">
            @if(Auth::user()->role == 0)
                公式プラン作成
            @else
                プラン作成
            @endif
        </div>

        <form action="{{ route('travels.planMake_submit') }}" method="post" id="form" enctype="multipart/form-data" novalidate>
        @csrf
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <label for="date">プラン名</label>
        @if($errors->has('title'))
            <div class="error_text">{{ $errors->first('title') }}</div>
        @endif
        <input type="text" id="title" name="title" value="{{ old('title', $data['title'] ?? '') }}">

        <label for="date">エリア</label>
        @if($errors->has('area'))
            <div class="error_text">{{ $errors->first('area') }}</div>
        @endif
        <select id="area" name="area">
            <option value="">選択してください</option>
            <option value="北海道">北海道</option>
            <option value="青森県">青森県</option>
            <option value="岩手県">岩手県</option>
            <option value="秋田県">秋田県</option>
            <option value="宮城県">宮城県</option>
            <option value="山形県">山形県</option>
            <option value="福島県">福島県</option>
            <option value="栃木県">栃木県</option>
            <option value="群馬県">群馬県</option>
            <option value="茨城県">茨城県</option>
            <option value="新潟県">新潟県</option>
            <option value="埼玉県">埼玉県</option>
            <option value="千葉県">千葉県</option>
            <option value="東京都">東京都</option>
            <option value="神奈川県">神奈川県</option>
            <option value="長野県">長野県</option>
            <option value="山梨県">山梨県</option>
            <option value="富山県">富山県</option>
            <option value="岐阜県">岐阜県</option>
            <option value="石川県">石川県</option>
            <option value="静岡県">静岡県</option>
            <option value="愛知県">愛知県</option>
            <option value="三重県">三重県</option>
            <option value="福井県">福井県</option>
            <option value="滋賀県">滋賀県</option>
            <option value="京都府">京都府</option>
            <option value="奈良県">奈良県</option>
            <option value="大阪府">大阪府</option>
            <option value="和歌山県">和歌山県</option>
            <option value="兵庫県">兵庫県</option>
            <option value="鳥取県">鳥取県</option>
            <option value="岡山県">岡山県</option>
            <option value="島根県">島根県</option>
            <option value="広島県">広島県</option>
            <option value="山口県">山口県</option>
            <option value="愛媛県">愛媛県</option>
            <option value="高知県">高知県</option>
            <option value="香川県">香川県</option>
            <option value="徳島県">徳島県</option>
            <option value="福岡県">福岡県</option>
            <option value="大分県">大分県</option>
            <option value="佐賀県">佐賀県</option>
            <option value="長崎県">長崎県</option>
            <option value="熊本県">熊本県</option>
            <option value="宮崎県">宮崎県</option>
            <option value="鹿児島県">鹿児島県</option>
            <option value="沖縄県">沖縄県</option>
        </select>
            
        <label for="date">滞在日数</label>
        @if($errors->has('date'))
            <div class="error_text">{{ $errors->first('date') }}</div>
        @endif
        <select id="date" name="date" onchange="changeDays()">
            <option value="" {{ old('date', $data['date'] ?? '') == '' ? 'selected' : '' }}>選択してください</option>
            <option value="日帰り" {{ old('date', $data['date'] ?? '') == '日帰り' ? 'selected' : '' }}>日帰り</option>
            <option value="一泊二日" {{ old('date', $data['date'] ?? '') == '一泊二日' ? 'selected' : '' }}>１泊２日</option>
            <option value="二泊三日" {{ old('date', $data['date'] ?? '') == '二泊三日' ? 'selected' : '' }}>２泊３日</option>
            <option value="三泊四日" {{ old('date', $data['date'] ?? '') == '三泊四日' ? 'selected' : '' }}>３泊４日</option>
            <option value="四泊五日" {{ old('date', $data['date'] ?? '') == '四泊五日' ? 'selected' : '' }}>４泊５日</option>
            <option value="五泊六日" {{ old('date', $data['date'] ?? '') == '五泊六日' ? 'selected' : '' }}>５泊６日</option>
            <option value="六泊以上" {{ old('date', $data['date'] ?? '') == '六泊以上' ? 'selected' : '' }}>６泊以上</option>
        </select>
           
        <label for="date">予算</label>
        @if($errors->has('money'))
            <div class="error_text">{{ $errors->first('money') }}</div>
        @endif
        <select id="money" name="money">
            <option value="">選択してください</option>
            <option value="~5000円">~5000円</option>
            <option value="5000~10000円">5000~10000円</option>
            <option value="10001~20000円">10001~20000円</option>
            <option value="20001~30000円">20001~30000円</option>
            <option value="30001~40000円">30001~40000円</option>
            <option value="40001~50000円">40001~50000円</option>
            <option value="50001~60000円">50001~60000円</option>
            <option value="60001~70000円">60001~70000円</option>
            <option value="70001~80000円">70001~80000円</option>
            <option value="80001~90000円">80001~90000</option>
            <option value="90001~100000円">90001~100000円</option>
            <option value="100001円以上">100001円以上</option>
        </select>

        <label for="traffic">主な移動手段</label>
        @if($errors->has('traffic'))
            <div class="error_text">{{ $errors->first('traffic') }}</div>
        @endif
        <select id="traffic" name="traffic">
            <option value="">選択してください</option>
            <option value="徒歩">徒歩</option>
            <option value="電車、鉄道メイン">電車、鉄道メイン</option>
            <option value="バスメイン">バスメイン</option>
            <option value="車(レンタカー)メイン">車(レンタカー)メイン</option>
            <option value="徒歩メイン＋飛行機">徒歩メイン＋飛行機</option>
            <option value="電車、鉄道メイン＋飛行機">電車、鉄道メイン＋飛行機</option>
            <option value="バスメイン＋飛行機">バスメイン＋飛行機</option>
            <option value="車(レンタカー)メイン＋飛行機">車(レンタカー)メイン＋飛行機</option>
        </select>

        <label for="spot">主なスポット</label>
        @if($errors->has('spot'))
            <div class="error_text">{{ $errors->first('spot') }}</div>
        @endif
        <div id="spotContainer">
            @foreach(range(1, 7) as $day) <!-- 1日目から7日目までループ -->
                <div class="dayContainter" id="day{{ $day }}">
                    <label>{{ $day }}日目</label>
                    @if(old('spot_day' . $day) || (isset($data['spot_day' . $day]) && is_array($data['spot_day' . $day])))
                        @foreach(old('spot_day' . $day, $data['spot_day' . $day] ?? []) as $index => $spot)
                            <input type="text" class="spotInput" name="spot_day{{ $day }}[]" value="{{ $spot }}">
                            @if($index > 0)
                                <button type="button" class="removeButton" onclick="removeSpot(this)">-</button>
                            @endif
                            <span class="arrow">→</span>
                        @endforeach
                    @else
                        <input type="text" class="spotInput" name="spot_day{{ $day }}[]" value="">
                        <span class="arrow"></span>
                    @endif
                    <button type="button" class="addButton" onclick="addSpot('day{{ $day }}')">+</button>
                </div>
            @endforeach
        </div>

        <label for="body">プラン紹介</label>
        @if($errors->has('body'))
            <div class="error_text">{{ $errors->first('body') }}</div>
        @endif
        <textarea name="body" cols="30" rows="10"></textarea>

        <label for="image">写真</label>
        <input type="file" id="image" name="image" onchange="previewImage(this);">
        <img id="preview" src="{{ $data['image'] ?? '' }}" alt="プレビュー画像" style="max-width:200px; {{ isset($data['image']) ? '' : 'display:none;' }}">

        <input id="btn" type=submit name="submit" value="投稿内容確認">

        </form>
    </main>
    <script>
    $(document).ready(function() {
        // spotContainerの中身をクリア
        $("#spotContainer").empty();

        // changeDays関数を実行
        changeDays();
    });

    // 日数に応じてフォームを追加・削除する関数
    function changeDays() {
        const selectedDays = document.getElementById('date').value;
        const spotContainer = document.getElementById('spotContainer');
        let currentDays = 0;

        if (selectedDays === "日帰り") {
            currentDays = 1;
        } else if (selectedDays === "一泊二日") {
            currentDays = 2;
        } else if (selectedDays === "二泊三日") {
            currentDays = 3;
        } else if (selectedDays === "三泊四日") {
            currentDays = 4;
        } else if (selectedDays === "四泊五日") {
            currentDays = 5;
        } else if (selectedDays === "五泊六日") {
            currentDays = 6;
        } else if (selectedDays === "六泊以上") {
            currentDays = 7;
        }

        // 現在の日数より選択された日数が多い場合、新しいフォームを追加
        for (let i = spotContainer.childElementCount + 1; i <= currentDays; i++) {
            const newDayContainer = document.createElement('div');
            newDayContainer.className = 'dayContainer';
            newDayContainer.id = 'day' + i;

            const newLabel = document.createElement('label');
            newLabel.innerHTML = i + '日目';

            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.className = 'spotInput';
            newInput.name = 'spot_day' + i + '[]';

            const newButton = document.createElement('button');
            newButton.type = 'button';
            newButton.className = 'addButton';
            newButton.innerHTML = '+';
            newButton.onclick = function() {
                addSpot('day' + i, 'arrow_day' + i);
            };

            const newArrow = document.createElement('span');
            newArrow.className = 'arrow';
            newArrow.id = 'arrow_day' + i;

            newDayContainer.appendChild(newLabel);
            newDayContainer.appendChild(newInput);
            newDayContainer.appendChild(newButton);
            newDayContainer.appendChild(newArrow);
            spotContainer.appendChild(newDayContainer);
        }

        // 現在の日数より選択された日数が少ない場合、不要なフォームを削除
        for (let i = spotContainer.childElementCount; i > currentDays; i--) {
            spotContainer.removeChild(spotContainer.lastChild);
        }
    }

    // 主なスポットの入力フォームを追加する関数
    function addSpot(dayId, arrowId) {
        const dayContainer = document.getElementById(dayId);
        const newInput = document.createElement('input');
        const newButton = document.createElement('button');
        const newArrow = document.createElement('span');

        newInput.type = 'text';
        newInput.className = 'spotInput';
        newInput.name = 'spot_' + dayId + '[]';

        newButton.type = 'button';
        newButton.className = 'removeButton';
        newButton.innerHTML = '-';
        newButton.onclick = function() {
            this.previousSibling.remove();
            this.previousSibling.remove();
            this.parentNode.removeChild(this);
        };

        newArrow.className = 'arrow';
        newArrow.innerHTML = '→';

        dayContainer.appendChild(newInput);
        dayContainer.appendChild(newButton);
        dayContainer.appendChild(newArrow);

        // 最初の矢印を表示
        const firstArrow = document.getElementById(arrowId);
        if (firstArrow.innerHTML === '') {
            firstArrow.innerHTML = '→';
        }
    }

    // すべての日数の入力されていたすべての値を動的にフォームに表示
    function removeSpot(button) {
        const input = button.previousElementSibling;
        const arrow = button.nextElementSibling;
        button.parentNode.removeChild(input);
        button.parentNode.removeChild(button);
        button.parentNode.removeChild(arrow);
    }

    // 画像のプレビュー表示
    function previewImage(input) {
        const file = input.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
        const preview = document.getElementById('preview');
        preview.src = e.target.result;
        preview.style.display = 'block';
        sessionStorage.setItem('uploadedImage', e.target.result);
        }

        reader.readAsDataURL(file);
    }
    </script>
    @include('layouts.footer')
</body>
</html>