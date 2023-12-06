<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Plan Make</title>
	<style>
	.shadow{
		border:1px solid black;
	}
	.displayNone{
		display:none;
	}
</style>
</head>
<body class="">
	<div>
    	<form method="post" action="">
		{{ csrf_field() }}
		@csrf
            <a onclick="incrementLikeCount(this)" class="">
			@if($like->favorite ==1)
	            <input type="image" src="{{asset('image/nicebutton.png')}}" width="30px" id="active" value="0">
			@else
				<input type="image" src="{{asset('image/nicebutton2.png')}}" width="30px" id="inactive" value="1">
			@endif
                いいね
                <!-- 「いいね」の数を表示 -->
                <span class="badge like-count">
                    {{$likesCount}}
                </span>
            </a>
			<input type="hidden" name="favo" value="2">
        </form>
	</div>
	<script>
	</script>
</body>
</html>