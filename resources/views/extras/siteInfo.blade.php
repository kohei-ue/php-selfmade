<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/extra.css">
    <script src="https://kit.fontawesome.com/9292378248.js" crossorigin="anonymous"></script>
    <title>サイト情報</title>
</head>
<body>
    @include('layouts.header')
    <main id="Info_body">
        <h1><i class="fa-solid fa-circle-info"></i> サイト情報</h1>
        <div class="info_text">
        <ul>
            <li>目的:<br> 当サイト「Tabi Notes」は、一人旅を計画し、共有するためのプラットフォームです。ユーザーは独自の旅行プランを作成し、他の旅行者と情報を交換できます。
            旅行プランの作り方がわからない方は<a href="{{ route('extras.ToNewComer') }}">こちら</a>からご確認ください。</li>
            <li>特色:<br> 当サイトは、旅行プランの作成、閲覧、共有が可能です。また、ユーザーは自分の旅行体験を旅日記として投稿し、他のユーザーと交流することができます。</li>
        </ul>
        </div>

        <h1><i class="fa-regular fa-circle-question"></i></i> サポートに関して</h1>
        <div class="support_text">
            <li>概要: 当サイトのユーザーサポートは、問い合わせフォームから受け付けています。ご質問や不明点がある場合は、お気軽にお問い合わせください。</li>
            <li>連絡先: 問い合わせフォームをご利用いただくか、support@tabinotes.com までメールでお問い合わせください。</li>
        </div>
    </main>
</body>
    @include('layouts.footer')
</html>