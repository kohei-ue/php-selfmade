<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/css/travel.css">
    <title>Tabi Notes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/luxy.js" charset="utf-8"></script>
    <script src="https://kit.fontawesome.com/9292378248.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('layouts.header')
    <main>
    <div id="luxy">
        <section class="outer-block">
            <div class="top-img">
                <img src="/image/header.jpg">
                <div class="top-text">ひとり旅を<br><span>より豊かに</span></div>
                <div class="image-name">金沢 医王山県立自然公園</div>
            </div>
            <div class="luxy-el leaves leaves01" data-speed-y="-10" data-offset="0" data-horizontal='1' data-speed-x="-10">
                <img src="/image/leaves01.png" alt="">
            </div>
            <div class="luxy-el leaves leaves02" data-speed-y="-10" data-offset="0" data-horizontal='1' data-speed-x="10">
                <img src="/image/leaves02.png" alt="">
            </div>
            <div class="luxy-el leaves-b leaves-b01" data-speed-y="-90" data-offset="0" data-horizontal='1' data-speed-x="-30">
                <img src="/image/leaves-blur01.png" alt="">
            </div>
            <div class="luxy-el leaves-b leaves-b02" data-speed-y="-90" data-offset="0" data-horizontal='1' data-speed-x="30">
                <img src="/image/leaves-blur02.png" alt="">
            </div>
            <div class="luxy-el leaves-b leaves-b03" data-speed-y="-60" data-offset="0" data-horizontal='1' data-speed-x="-30">
                <img src="/image/leaves-blur03.png" alt="">
            </div>
            <div class="luxy-el leaves-b leaves-b04" data-speed-y="-60" data-offset="0" data-horizontal='1' data-speed-x="30">
                <img src="/image/leaves-blur04.png" alt="">
            </div>
        </section>

        <div class="intro-text">
            Tabi Notesは一人旅をより楽しく、充実したものにするプラットフォームです。自分だけの特別な旅行ルートを作成したり、一人旅の魅力や共有したいエピソードを記録・共有することが可能です。このサイトは、新しい冒険を求める全ての一人旅愛好家に捧げます。あなたの旅のパートナー、Tabi Notesで、未知なる旅路を切り開きましょう。
        </div>

        <div id="plan_indexList">
            <div class="list_container">
                <h2 class="listText_latest">最近投稿されたプラン</h2>
                <div class="latestPlans">
                    @foreach($latestPlans as $latestPlan)
                        <div class="plan_item">
                            <div class="plan_area">{{ $latestPlan['area'] }}</div>
                            <div class="plan_title">{{ $latestPlan['title'] }}</div>
                            <div class="plan_maker">{{ $latestPlan->user->name }}さん</div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="list_container">
                <h2 class="listText_popular">人気のプラン</h2>
                <div class="popularPlans">
                    @foreach($popularPlans as $popularPlan)
                        <div class="plan_item">
                            <div class="plan_area">{{ $popularPlan->area }}</div>
                            <div class="plan_title">{{ $popularPlan->title }}</div>
                            <div class="plan_maker">{{ $popularPlan->user_name }}さん</div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="weather-info">
            <h4></h4>
            <!-- JavaScriptで動的に天気情報が挿入される -->
        </div>

        <section class="section-container">
            <div class="section-img">
                <img src="/image/plan-list.jpg">
            </div>
            <div class="section-content">
                <h3><i class="fa-solid fa-magnifying-glass fa-fade"></i> プラン一覧</h3>
                <p>あなたの完璧な旅を見つけるためのプランを探索しましょう。多様なプランから選べるため、初心者から上級者まで、それぞれのニーズに合ったプランが見つかります。地域やテーマ別にも検索可能で、あなたの興味に合った最高のプランを提供します。さあ、新しい冒険を始める準備をしましょう。</p>
                <a href="{{ route('travels.planIndex') }}" class="feature-button">プランを探す</a>
            </div>
        </section>

        <div id="width-section01" class="vh-element" data-props="padding-top" data-values="50">
            <div id="bg-section01" class="luxy-el bg-section" data-speed-y="-10"></div>
        </div>

        <section class="section-container reverse-order">
            <div class="section-img reverse-img">
                <img src="/image/plan-create.jpg">
            </div>
            <div class="section-content reverse-content">
                <h3><i class="fa-regular fa-pen-to-square fa-fade fa-lg"></i> プラン作成</h3>
                <p>自分だけの特別な旅行ルートを作成し、新しい冒険を始めましょう。プラン作成ページでは、目的地、交通手段、滞在日数などを自由にカスタマイズできます。旅のプロフェッショナルになり、自分だけの素晴らしい体験を作り上げましょう。</p>
                <a href="{{ route('travels.planMake') }}" class="feature-button">プランを作る</a>
            </div>
        </section>

        <div id="width-section02" class="vh-element" data-props="padding-top" data-values="50">
            <div id="bg-section02" class="luxy-el bg-section" data-speed-y="-10"></div>
        </div>

        <section class="section-container">
            <div class="section-img">
                <img src="/image/travel-diary.jpg">
            </div>
            <div class="section-content">
                <h3><i class="fa-regular fa-image fa-fade fa-lg"></i> 旅日記</h3>
                <p>旅の思い出を記録し、共有する場所。あなたの物語を語りましょう。旅日記ページでは、写真を追加して、旅のエピソードを豊かに表現できます。他のユーザーの体験を見ることで、新しい旅のインスピレーションを得ることもできます。あなたの旅の経験と感動を、世界中の旅行愛好者と共有しましょう。</p>
                <a href="{{ route('diaries.diaryIndex') }}" class="feature-button">旅日記を見る</a>
            </div>
        </section>

        <div id="width-section03" class="vh-element" data-props="padding-top" data-values="50">
            <div id="bg-section03" class="luxy-el bg-section" data-speed-y="-10"></div>
        </div>

        <section class="section-container reverse-order">
            <div class="section-img reverse-img">
                <img src="/image/keijiban.jpg">
            </div>
            <div class="section-content reverse-content">
                <h3><i class="fa-solid fa-chalkboard-user fa-fade fa-lg"></i> 掲示板</h3>
                <p>この掲示板は、一人旅の計画を立てている方々が情報交換やアイデアを共有できる交流の場です。旅の仲間を見つけ、新しい体験を共有しましょう。</p>
                <a href="{{ route('extras.board') }}" class="feature-button">交流する</a>
            </div>
        </section>
        @include('layouts.footer')
    </div>
        <button class="to_pageTop" id="to_pageTop" aria-label="scrollTop" style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path fill="#ffffff" d="m12.9 5.1 10.7 10.7c.5.5.5 1.4 0 1.9l-1.2 1.2c-.5.5-1.3.5-1.9 0L12 10.4l-8.5 8.5c-.5.5-1.3.5-1.9 0L.4 17.7c-.5-.5-.5-1.4 0-1.9L11.1 5.1c.5-.5 1.3-.5 1.8 0z"/>
            </svg>
        </button>
    </main>
</body>
    <script>
    luxy.init({
        wrapper: '#luxy',
        targets : '.luxy-el',
        wrapperSpeed:  0.08
    });
    </script>
    <script src="/js/index.js"></script>
    <script src="/js/toPageTop.js"></script>
</html>