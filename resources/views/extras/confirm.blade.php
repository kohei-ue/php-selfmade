<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/extra.css">
    <script src="https://kit.fontawesome.com/9292378248.js" crossorigin="anonymous"></script>
    <title>送信確認</title>
</head>
<body>
    @include('layouts.header')
<main>
    <div class="contact-content">
        <h1><i class="fa-solid fa-address-book"></i> お問い合わせ</h1>
        <form action="/confirmForm" method="POST" id="confirm-form">
            @csrf
            <div class="confirm-text">
                <p>下記の内容をご確認の上送信ボタンを押してください<br>内容を訂正する場合は戻るを押してください。</p>
            </div>

            <div class="confirm-form">
                <h2>ユーザー名</h2>
                <input type="hidden" id="input2" name="name" value="{{ Session::get('contact_data.name') }}">
                <p>{{ Session::get('contact_data.name') }}</p>
            </div>

            <div class="confirm-form">
                <h2>電話番号</h2>
                <input type="hidden" id="input2" name="tel"  value="{{ Session::get('contact_data.tel') }}">
                <p>{{ Session::get('contact_data.tel') }}</p>
            </div>

            <div class="confirm-form">
                <h2>メールアドレス</h2>
                <input type="hidden" id="input2" name="email" value="{{ Session::get('contact_data.email') }}>">
                <p>{{ Session::get('contact_data.email') }}</p>
            </div>

            <div class="confirm-form">
                <h2>お問い合わせ内容</h2>
                <input type="hidden" id="input2" name="body" value="{{ Session::get('contact_data.body') }}">
                <p>{{ Session::get('contact_data.body') }}</p>
            </div>

            <div class="confirm-btn">
                <input id="btn" type=submit value="送 信">
                <input id="btn_back" type=button value="戻 る" onclick="history.back(-1)">
            </div>
        </form>
    </div>
</main>
    @include('layouts.footer')
</body>
</html>