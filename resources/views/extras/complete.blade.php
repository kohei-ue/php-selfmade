<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/extra.css">
    <script src="https://kit.fontawesome.com/9292378248.js" crossorigin="anonymous"></script>
    <title>完了画面</title>
</head>

<body>
    @include('layouts.header')
<main>
    <div class="contact-content">
        <h1><i class="fa-solid fa-address-book"></i> お問い合わせ</h1>
        <form id="confirm-form">
            <div class="complete-textbox">
                <h3>お問い合わせ頂きありがとうございます。<br>
                送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。<br>
                なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</h3>

                <a class="to_topPage" href="{{ route('travels.index') }}">
                トップへ戻る
                </a>
            </div>
        </form>
    </div>
</main>
    @include('layouts.footer')
</body>