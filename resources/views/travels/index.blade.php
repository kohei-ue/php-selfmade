<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/travel.css">
    <title>Tabi Notes</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
    @include('layouts.header')
    <main>
    <div class="top-img">
        <img src="/image/header.jpg">
        <div class="top-text">ひとり旅を<br><span>より豊かに</span></div>
    </div>
    <div class="intro-text">
        Tabi Notesは一人旅をより楽しく、充実したものにするプラットフォームです。自分だけの特別な旅行ルートを作成したり、一人旅の魅力や共有したいエピソードを記録・共有することが可能です。このサイトは、新しい冒険を求める全ての一人旅愛好家に捧げます。あなたの旅のパートナー、Tabi Notesで、未知なる旅路を切り開きましょう。
    </div>
        <div class="section-container">
            <div class="section-img">
                <img src="/image/plan-list.jpg">
            </div>
            <div class="section-content">
                <h3>プラン一覧</h3>
                <p>あなたの完璧な旅を見つけるためのプランを探索しましょう。多様なプランから選べるため、初心者から上級者まで、それぞれのニーズに合ったプランが見つかります。地域やテーマ別にも検索可能で、あなたの興味に合った最高のプランを提供します。さあ、新しい冒険を始める準備をしましょう。</p>
                <a href="{{ route('travels.planIndex') }}" class="feature-button">プランを探す</a>
            </div>
        </div>

        <div class="section-container reverse-order">
            <div class="section-img reverse-img">
                <img src="/image/plan-create.jpg">
            </div>
            <div class="section-content reverse-content">
                <h3>プラン作成</h3>
                <p>自分だけの特別な旅行ルートを作成し、新しい冒険を始めましょう。プラン作成ページでは、目的地、交通手段、滞在日数などを自由にカスタマイズできます。旅のプロフェッショナルになり、自分だけの素晴らしい体験を作り上げましょう。</p>
                <a href="{{ route('travels.planMake') }}" class="feature-button">プランを作る</a>
            </div>
        </div>
        
        <div class="section-container">
            <div class="section-img">
                <img src="/image/travel-diary.jpg">
            </div>
            <div class="section-content">
                <h3>旅日記</h3>
                <p>旅の思い出を記録し、共有する場所。あなたの物語を語りましょう。旅日記ページでは、写真を追加して、旅のエピソードを豊かに表現できます。他のユーザーの体験を見ることで、新しい旅のインスピレーションを得ることもできます。あなたの旅の経験と感動を、世界中の旅行愛好者と共有しましょう。</p>
                <a href="{{ route('travels.diaryIndex') }}" class="feature-button">旅日記を見る</a>
            </div>
        </div>
    </main>
    <script>
    $(document).ready(function() {
        var images = [
            '/image/header.jpg',
            '/image/header2.jpg',
            '/image/header3.jpg',
            '/image/header4.jpg'
        ];
        var currentImageIndex = 0;

        setInterval(function() {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            $('.top-img img').fadeOut(400, function() {
                $(this).attr('src', images[currentImageIndex]).fadeIn(400);
            });
        }, 4000); // 4秒おきに画像を変更
    });

    $(document).scroll(function() {
        var scrollPosition = $(this).scrollTop() + $(window).height();
        $('.section-container').each(function() {
            var sectionTop = $(this).offset().top;
            var sectionBottom = sectionTop + $(this).outerHeight();
            var triggerPositionEnter = sectionTop + $(this).outerHeight() / 4; // セクションの上部が1/4だけ表示されたらトリガー
            var triggerPositionLeave = sectionBottom; // セクションが画面から完全に出たらトリガー

            // 要素が画面内に入った場合のアニメーション
            if (scrollPosition > triggerPositionEnter && $(this).scrollTop() < sectionBottom) {
                $(this).css({
                    'transform': 'translateY(0)',
                    'opacity': '1'
                });
            }
            // 要素が画面外に出た場合の初期状態へのリセット
            else if (scrollPosition < triggerPositionEnter || $(this).scrollTop() > triggerPositionLeave) {
                $(this).css({
                    'transform': 'translateY(50px)',
                    'opacity': '0'
                });
            }
        });
    });
    </script>
</body>
    @include('layouts.footer')
</html>