<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/user.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Irish+Grover&display=swap">
    <title>アカウント情報</title>
</head>
<body>
    @include('layouts.header')
    <div class="container">
    <div class="info_title">ユーザー情報</div>
        <div class="info_index">メールアドレス</div>
            <div class="info_detail">{{$user->email}}</div>
        <div class="info_index">ユーザー名</div>
            <div class="info_detail">{{$user->name}}</div>
        <div class="info_index">登録日</div>
            <div class="info_detail">{{$user->created_at}}</div>
    <div class="info_index">自分のプラン</div>
    <div>
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
                    <strong>滞在日数：</strong>{{ $plan->date }}
                </div>
                <div class="plan_money">
                    <strong>想定予算：</strong>{{ $plan->money }}
                </div>
                <div class="plan_traffic">
                    <strong>主な移動手段：</strong>{{ $plan->traffic }}
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
                <div>
                    <span>
                    <iframe src="/favorite/{{$plan->id}}" width="200px" height="50px" id="iframe" scrolling="no" style="border:none;"></iframe>
                    </span>
                </div>
                <button class="edit-button" onclick="editPlan(this, {{ $plan->id }})">編集</button>
            </div>
        </div>
            <a onclick="confirmDelete()" class="delete-button">削除</a>
    @endforeach
    </div>
    <div class="info_index" id="done_good">いいねしたプラン</div>
    <div>
    @foreach($likePlans as $likePlan)
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
                <div class="plan_title @if($likePlan->role != 1) has_official_mark @endif">
                    @if ($likePlan->role != 1 )
                    <span class="official_mark">公式</span>
                    @endif
                    {{$likePlan->title}}
                </div>
                <div class="plan_date">
                    <strong>滞在日数</strong>：{{ $likePlan->date }}
                </div>
                <div class="plan_money">
                    <strong>想定予算</strong>：{{ $likePlan->money }}
                </div>
                <div class="plan_traffic">
                    <strong>主な移動手段</strong>：{{ $likePlan->traffic }}
                </div>
                <div class="plan_details">
                    <div class="plan_image">
                        <img src="{{ asset('storage/' . $likePlan->image) }}" alt="{{ $likePlan->title }}">
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
                    {{ $likePlan->body }}
                </div>
                @if($likePlan->role != 0)
                    <div class="plan_maker">
                        作成者：{{ $likePlan->name}}
                    </div>
                @endif
                <div>
                    <span>
                    <iframe src="/favorite/{{$likePlan->plan_id}}" width="200px" height="50px" id="iframe" scrolling="no" style="border:none;"></iframe>
                    </span>
                </div>
            </div> 
        </div>
        @if($user && $user->role == 0)
            <a onclick="confirmDelete()" class="delete-button">削除</a>
        @endif
    @endforeach
    </div>
    <script>
    let fff = document.querySelector('.kfd2').textContent;
    console.log(fff);
    </script>
    </div>
@include('layouts.footer')
<script src="/js/userInfo.js"></script>
</body>
</html>