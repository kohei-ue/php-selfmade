<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    <script>
        function confirmDelete() {
            return confirm('このユーザーデータを削除しますか？');
        }
    </script>
    <title>admin_userlist</title>
</head>
@include('layouts.admin_header')
<main>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
<table class="index">
    <h1>登録ユーザー一覧</h1>
    <tr>
        <th>ID</th>
        <th>ユーザー名</th>
        <th>メールアドレス</th>
        <th>役割</th>
        <th>登録日</th>
        <th>最終更新日</th>
        <th></th>
    </tr>
    @foreach($users as $user)
    <tr>
        <th>{{ $user->id }}</th>
        <th>{{ $user->name }}</th>
        <th>{{ $user->email }}</th>
        <th>{{ $user->role == 0 ? '管理者' : '一般' }}</th>
        <th>{{ $user->created_at ? $user->created_at->format('Y年m月d日') : '' }}</th>
        <th>{{ $user->updated_at ? $user->updated_at->format('Y年m月d日') : '' }}</th>
        <th><a onclick="confirmDelete()" id="btn_delete">削除</a></th>
    </tr>
    @endforeach
</table>
</main>
    @include('layouts.footer')
</html>