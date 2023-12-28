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
        <ol class="breadcrumb" id="breadComer">
            <li><a href="{{ route('travels.index') }}">ホーム</a></li>
            <li><a href="{{ route('travels.planIndex') }}">プラン一覧</a></li>
            <li><a href="">{{ $name }}</a></li>
        </ol>
        <div id="background-overlay"></div>
        <div class="plan_page_title">{{ $name }}のプラン</div>
        <div class="visiter" style="font-weight: bold">
            <?php
            echo "累計訪問者数：　".$visitorCount."人";
            ?>
        </div>
        <label class="selectbox-001">
            <select id="pre_select">
                <?php
                    foreach($selectOptions as $value){
                        echo $value;
                    }
                ?>
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
        <div class="plan_container" id="plan{{$loop->index}}">
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

        <nav class="paginate" aria-label="Page navigation">
            <ul class="pagination">
                <!-- 前のページへのリンク -->
                <li class="page-item">
                    <a href="#" class="page-link" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>

                <!-- ページ番号のリンク（動的に生成される） -->
                <!-- この部分はJavaScriptで生成される -->

                <!-- 次のページへのリンク -->
                <li class="page-item">
                    <a href="#" class="page-link" aria-label="Next">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>

        <button class="back_button" onclick="history.back(-1)">戻る</button>
    </main>
    <script src="/js/pageNation.js"></script>
    <script src="/js/plan_page.js"></script>
</body>
    <script>
        function confirmDelete() {
            return confirm('このプランを削除しますか？');
        }

        const select = document.querySelector('[id="pre_select"]');//セレクトボックスを指定
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