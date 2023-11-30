<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/admin.css">
    <title>Tabi Notes_admin</title>
</head>
<body>
    @include('layouts.admin_header')
    <main>
        <div class="section-container">
            <div class="section-content">
                <h3>ホームページ確認</h3>
                <a href="{{ route('travels.index') }}" class="feature-button">ホームページ確認へ</a>
            </div>
        </div>

        <div class="section-container">
            <div class="section-content">
                <h3>プラン作成</h3>
                <a href="{{ route('travels.planMake') }}" class="feature-button">作成画面へ</a>
            </div>
        </div>
        
        <div class="section-container">
            <div class="section-content">
                <h3>旅行プランの確認・削除</h3>
                <a href="{{ route('travels.planIndex') }}" class="feature-button">確認・削除へ</a>
            </div>
        </div>

        <div class="section-container">
            <div class="section-content">
                <h3>登録ユーザー一覧</h3>
                <a href="{{ route('admins.adminUserlist') }}" class="feature-button">ユーザー一覧へ</a>
            </div>
        </div>
    </main>
    @include('layouts.footer')
</body>
</html>