<?php
if(empty($userPHP)){
    header('Location:'.'/',true,301);
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/css/diary.css">
    <title>diary</title>
    <script src="https://kit.fontawesome.com/9292378248.js" crossorigin="anonymous"></script>
</head>
<body>
    @include('layouts.header')
    <main>
        <div class="title_diary"><i class="fa-solid fa-book fa-beat fa-lg"></i> 旅日記詳細</div>
        <div class="diary_container2">
            <div class="plan_content">
                <div class="plan_title">
                    {{ $diary->title }}
                </div>
                <div class="plan_maker">
                    作成者：{{ $diary->user->name }}さん
                </div>
                <div class="diary_area2">
                    行ったところ：{{ $diary->area }}
                </div>
                <div class="diary_date2">
                    日程：{{ date('Y年m月d日', strtotime($diary->start_date)) }} ～ {{ date('Y年m月d日', strtotime($diary->end_date)) }}
                </div>
                <div class="plan_body">
                    @php
                        $summary_days = explode(' ', trim($diary->summary_day));
                        $diary_days = explode(' ', trim($diary->diary_day));
                    @endphp

                    @for($i = 0; $i < count($summary_days); $i++)
                    <div class="day_section">
                        <div class="diary_summary">
                            {{ $i + 1 }}日目：{{ $summary_days[$i] }}
                        </div>
                        <div class="diary_body">
                            体験したことや感想：
                            <p>{{ $diary_days[$i] }}</p>
                        </div>
                    </div>
                    @endfor
                </div>
                <div class="diary_image">
                    <img id="diary_image1" src="{{ asset('storage/' . $diary->image1) }}" alt="{{ $diary->title }}">
                    <img id="diary_image2" src="{{ asset('storage/' . $diary->image2) }}" alt="{{ $diary->title }}">
                </div>
            </div>
        </div>

        <div class="comments-section">
            <h3><i class="fa-regular fa-comment fa-flip-horizontal"></i> コメント</h3>
            <form id="comment-form" method="post" action="{{ route('comment.store') }}">
                @csrf
                <input type="hidden" name="diary_id" value="{{ $diary->id }}">
                <textarea name="comment" class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" rows="4" required>{{ old('comment') }}</textarea>
                @if ($errors->has('comment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment') }}
                    </div>
                @endif
                <button class="submit-comment" type="submit">コメントする</button>
            </form>

            @if($diary->comments && count($diary->comments) > 0)
                <!-- コメントの表示 -->
                @foreach ($diary->comments as $comment)
                    <div class="comment">
                        <p>{{ $comment->user->name }}: {{ $comment->comment }} <span>{{ date('Y年m月d日h時m分', ($comment->date)) }}</span></p>
                        <!-- 返信と削除のボタン（管理者またはコメントの所有者の場合のみ表示） -->
                        @if (Auth::check() && (Auth::user()->is_admin || Auth::user()->id == $comment->user_id))
                            <form id="delete_comment_form" method="post" action="{{ route('comment.delete', $comment->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit">削除</button>
                            </form>
                        @endif
                    </div>
                @endforeach
            @else
                <div class="nocomment">コメントがまだありません。</div>
            @endif
        </div>

        <input id="btn_back" type=button value="戻る" onclick="history.back(-1)">
    </main>
    @include('layouts.footer')
</body>
</html>