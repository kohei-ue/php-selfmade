<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/extra.css">
    <title>掲示板</title>
    <script src="https://kit.fontawesome.com/9292378248.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('layouts.header')
    <main>
        <div class="board-container">
            <ol class="breadcrumb">
                <li><a href="{{ route('travels.index') }}">ホーム</a></li>
                <li><a href="">掲示板</a></li>
            </ol>
            <h2>掲示板</h2>

            <div class="post-form">
                <form action="/board" method="post">
                    @csrf
                    <textarea name="message" placeholder="メッセージを入力..."></textarea>
                    <button type="submit">投稿する</button>
                </form>
            </div>

            <div class="posts-container">
                <!-- 投稿されたメッセージがここに表示される -->
                @foreach ($posts as $post)
                <div class="post">
                    <p style="margin: 0;">{{ $post->id }}.{{ $post->user->name }}さん</p>
                    <p style="font-weight: bold">{{ $post->message }}</p>
                    <span>{{ $post->created_at->diffForHumans() }}</span>

                    <i class="fa-solid fa-reply fa-xl" onclick="showReplyForm({{ $post->id }})"></i>
                </div>

                <div class="reply-container">
                    <div class="reply-form" id="reply-form-{{ $post->id }}" style="display: none;">
                        <form action="/reply-to-post/{{ $post->id }}" method="post">
                        @csrf
                            <textarea name="message" cols="10" rows="5">>>{{ $post->id }}
</textarea>
                            <button type="submit">返信する</button>
                        </form>
                    </div>

                    <div class="replies">
                        @foreach ($post->replies as $reply)
                            <div class="reply">
                                <!-- 返信の内容を表示 -->
                                <p style="margin: 0;">{{ $post->id + 1}}.{{ $reply->user ? $reply->user->name : '名無し' }}さん</p>
                                <p style="font-weight: bold">{{ $reply->message }}</p>
                                <span>{{ $reply->created_at->diffForHumans() }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <button class="to_pageTop" id="to_pageTop" aria-label="scrollTop" style="display: none;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                <path fill="#ffffff" d="m12.9 5.1 10.7 10.7c.5.5.5 1.4 0 1.9l-1.2 1.2c-.5.5-1.3.5-1.9 0L12 10.4l-8.5 8.5c-.5.5-1.3.5-1.9 0L.4 17.7c-.5-.5-.5-1.4 0-1.9L11.1 5.1c.5-.5 1.3-.5 1.8 0z"/>
            </svg>
        </button>
    </main>
</body>
    @include('layouts.footer')
    <script src="/js/toPageTop.js"></script>
    <script>
    function showReplyForm(postId) {
        var form = document.getElementById('reply-form-' + postId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
    </script>
</html>