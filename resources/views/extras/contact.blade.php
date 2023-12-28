<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/extra.css">
    <script src="https://kit.fontawesome.com/9292378248.js" crossorigin="anonymous"></script>
    <title>お問い合わせ</title>
</head>
<body>
    @include('layouts.header')
<main>
    <div class="contact-content">
        <h1><i class="fa-solid fa-address-book"></i> お問い合わせ</h1>
        <form action="/contactForm" method="post" id="contact-form" novalidate>
            @csrf
            <div class="contact-text">
                <h2>下記の項目をご記入の上送信ボタンを押してください</h2>
                <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
                <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
                <p id="pp"><span>*</span>は必須項目となります。</p>
            </div>

            <div class="contact-form">
                <h2>ユーザー名<span>*</span></h2>
                <input type="text" id="input1" name="name" value="{{ old('name', $user->name) }}">
                @error('name')
                <div class="error_text">{{ $errors->first('name') }}</div>
                @enderror
            </div>

            <div class="contact-form">
                <h2>電話番号</h2>
                <input type="text" id="input1" name="tel" placeholder="09012345678" value="{{ old('tel', Session::get('contact_data.tel')) }}">
                @error('tel')
                <div class="error_text">{{ $errors->first('tel') }}</div>
                @enderror
            </div>

            <div class="contact-form">
                <h2>メールアドレス<span>*</span></h2>
                <input type="email" id="input1" name="email" placeholder="test@test.co.jp" value="{{ old('email', Session::get('contact_data.email')) }}">
                @error('email')
                <div class="error_text">{{ $errors->first('email') }}</div>
                @enderror
            </div>

            <div class="contact-form">
                <h2>お問い合わせ内容をご記入ください<span>*</span></h2>
                <textarea name="body" cols="75" rows="15">{{ old('body', Session::get('contact_data.body')) }}</textarea>
                @error('body')
                <div class="error_text">{{ $errors->first('body') }}</div>
                @enderror
            </div>

            <input id="btn" type=submit name="submit" value="送 信">
        </form>
    </div>
</main>
  @include('layouts.footer')
</body>
</html>