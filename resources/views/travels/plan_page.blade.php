

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="/css/plan.css">
    <title>{{ $name }}のプラン</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body id="plan_page_body">
    @include('layouts.header')
    <main>
        <div class="title">{{ $name }}のプラン</div>
        <div class="visiter">
            <?php
            echo "累計訪問者数：　".$visitorCount."人";
            ?>
        </div>
        <label class="selectbox-001">
            <select id="pre_select">
                <option value="{{$name}}" selected>{{$name}}</option>
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
        </label>
        <form class="sort-form" method="get" action="{{ route('showPlans', ['name' => $name]) }}">
            <select class="sort-menu" name="sort_by">
                <option value="date">滞在日数</option>
                <option value="money">予算</option>
                <option value="traffic">移動手段</option>
                <option value="likes_count">いいねの数</option>
            </select>
            <select class="sort-menu" name="order">
                <option value="asc">昇順</option>
                <option value="desc">降順</option>
            </select>
            <button type="submit">並び替え</button>
        </form>
        @foreach($plans as $plan)
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>  
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        <div class="plan_container">
            <div class="plan_content">
                <div class="plan_title @if($plan->user->role != 1) has_official_mark @endif">
                    @if($plan->user->role != 1)
                        <span class="official_mark">公式</span>
                    @endif
                    {{ $plan->title }}
                </div>
                <div class="plan_date">
                    <strong>滞在日数</strong>：{{ $plan->date }}
                </div>
                <div class="plan_money">
                    <strong>想定予算</strong>：{{ $plan->money }}
                </div>
                <div class="plan_traffic">
                    <strong>主な移動手段</strong>：{{ $plan->traffic }}
                </div>
                <div class="plan_details">
                    <div class="plan_image">
                        <img src="{{ asset('storage/' . $plan->image) }}" alt="{{ $plan->title }}">
                        <!-- <img src="image/kyoto temple.jpg" alt="{{ $plan->title }}"> -->
                    </div>
                    <div class="plan_spot">
                        <?php
                        $spots = json_decode($plan->spot, true);
                        $dayCount = 1;
                        foreach ($spots as $day => $locations) {
                            echo "<strong>" . ucfirst($day) . ":</strong>";
                            echo implode('→', $locations) . "<br>";
                            $dayCount++;
                        }
                        ?>
                    </div>
                </div>
                <div class="plan_body">
                    {{ $plan->body }}
                </div>
                @if($plan->user->role != 0)
                    <div class="plan_maker">
                        作成者：{{ $plan->user->name }}
                    </div>
                @endif
                <div>
                    <span>
                    <iframe src="/favorite/{{$plan->id}}" width="200px" height="50px" id="iframe" scrolling="no" style="border:none;"></iframe>
                    </span>
                </div>
            </div> 
        </div>
        @if($user && $user->role == 0)
            <a onclick="confirmDelete()" class="delete-button">削除</a>
        @endif
        @endforeach

        <button class="back_button" onclick="history.back(-1)">戻る</button>
    </main>
</body>
    <script>
        function confirmDelete() {
            return confirm('このプランを削除しますか？');
        }

        const select = document.querySelector('[id="select"]');//セレクトボックスを指定
        select.addEventListener('change', function() {
            var selected = select.value;//セレクトボックスで選ばれているオプションのvalueを取得
            changePlanPage(selected);
        });
        function changePlanPage(todouhuken){
            location.assign(todouhuken);
        }
    </script>
    @include('layouts.footer')
</html>