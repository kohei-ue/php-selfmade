<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/login.css">
    <title>登録完了画面</title>
</head>
<body>
    <h2>新規登録</h2>
    <div class="regi_comp">
        <h1>登録が完了しました。<br>以下をクリックしてログインへお進みください。</h1>
        <a href="{{ route('logins.login') }}" class="go_to_login">ログイン画面に戻る</a>
    </div>
</body>
</html>