<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Irish+Grover&display=swap">
    <title>ログイン画面</title>
</head>
<body>
    <form action="{{ route('logins.userLogin') }}" method="POST" class="login_form" novalidate>
        @csrf
        <div class="logo">
            <img src="/image/Tabi Notes.jpg">
            <div class="logo_text">Tabi<br><span>Notes</span></div>
        </div>

        <h3>ログインID:</h3>
        @if($errors->has('email'))
            <div class="error_text">{{ $errors->first('email') }}</div>
        @endif
        <input type="text" class="login_input" id="email" name="email" placeholder="メールアドレス">

        <h3>パスワード:</h3>
        @if($errors->has('password'))
            <div class="error_text">{{ $errors->first('password') }}</div>
        @endif
        <input type="password" class="login_input" id="password" name="password" placeholder="パスワード">

        <input type="submit" value="Let's Travel!!" class="login">
        <a href="{{ route('logins.register') }}" class="to-register">初めての方はこちら</a>
    </form>
</body>
</html>