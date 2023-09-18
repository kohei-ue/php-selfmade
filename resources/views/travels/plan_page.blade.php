<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/plan.css">
    <title>{{ $name }}のプラン</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    @include('layouts.header')
    <main>
        <div class="title">{{ $name }}のプラン</div>

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
                <div class="like-button" data-plan-id="{{ $plan->id }}">
                    いいね {{ $plan->likes_count }}
                </div>
            </div> 
        </div>
        @if($user && $user->role == 0)
            <a onclick="confirmDelete()" class="delete-button">削除</a>
        @endif
        @endforeach
    </main>
</body>
    <script>
        function confirmDelete() {
            return confirm('このプランを削除しますか？');
        }

        $('.like-button').click(function() {
            var planId = $(this).data('plan-id');
            $.ajax({
                url: '/like/' + planId,
                type: 'POST',
                success: function(response) {
                    // いいねの数を更新
                }
            });
        });
    </script>
    @include('layouts.footer')
</html>