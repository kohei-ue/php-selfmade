<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
class CommentController extends Controller
{
    // コメントの保存
    public function storeComment(CommentRequest $request) {
        if (!Auth::check()) {
            // ログインしていない場合はリダイレクト
            return redirect()->route('login');
        }
        $comment = new Comment();
        $comment->diary_id = $request->diary_id;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();

        return back();
    }

    // コメントの削除
    public function deleteComment($id) {
        $comment = Comment::find($id);
        if ($comment && (Auth::user()->is_admin || Auth::user()->id == $comment->user_id)) {
            $comment->delete();
        }

        return back();
    }
}
