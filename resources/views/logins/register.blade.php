<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/login.css">
    <title>新規登録画面</title>
</head>
<body>
    <form action="{{ route('logins.userRegister') }}" method="POST" class="login_form" novalidate>
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

        <h3>ユーザー種別選択:</h3>
        <div class="radio-group">
            <label><input type="radio" class="login_radio" id="normal_user" name="role" value="1" checked>一般ユーザー</label>
            <label><input type="radio" class="login_radio" id="admin_user" name="role" value="0">管理ユーザー</label>
        </div>

        <div class="buttons">
        <input type="submit" value="登録" class="register">
        <a href="{{ route('logins.login') }}" class="back_to_login">ログイン画面に戻る</a>
        </div>
    </form>
</body>
</html>