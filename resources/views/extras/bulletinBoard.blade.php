<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/extra.css">
    <title>Bulletin Board</title>
    <script src="https://kit.fontawesome.com/9292378248.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('layouts.header')
    <main>
        <div class="bulletin-board-container">
            <h2>掲示板</h2>

            <div class="post-form">
                <form action="/path/to/server/side/script" method="post">
                    <textarea name="message" placeholder="メッセージを入力..."></textarea>
                    <button type="submit">投稿する</button>
                </form>
            </div>

            <div class="posts-container">
                <!-- 投稿されたメッセージがここに表示される -->
            </div>
        </div>
    </main>
</body>
    @include('layouts.footer')
</html>