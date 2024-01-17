<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/login.css">
    <title>管理者登録画面</title>
</head>
<body id="register_body">
    <h1 class="register_title">管理者新規登録</h1>
    <form action="{{ route('admins.userRegisterAd') }}" method="POST" class="login_form" novalidate>
        @csrf
        <h3>ユーザー名:</h3>
        @if($errors->has('name'))
            <div class="error_text">{{ $errors->first('name') }}</div>
        @endif
        <input type="text" class="login_input" id="name" name="name" placeholder="例) 山田太郎">

        <h3>ログインID:</h3>
        @if($errors->has('email'))
            <div class="error_text">{{ $errors->first('email') }}</div>
        @endif
        <input type="text" class="login_input" id="email" name="email" placeholder="例) example@mail.com">

        <h3>パスワード:</h3>
        @if($errors->has('password'))
            <div class="error_text">{{ $errors->first('password') }}</div>
        @endif
        <input type="password" class="login_input" id="password" name="password" placeholder="パスワード">

        <h3>パスワード確認:</h3>
        @if($errors->has('password_conf'))
            <div class="error_text">{{ $errors->first('password_conf') }}</div>
        @endif
        <input type="password" class="login_input" id="password_conf" name="password_conf" placeholder="パスワード">

        <div class="buttons">
        <input type="submit" value="登録" class="register">
        <a href="{{ route('logins.login') }}" class="back_to_login">ログイン画面に戻る</a>
        </div>
    </form>
</body>
</html>