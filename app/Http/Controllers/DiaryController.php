<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\DiaryRequest;
use App\Models\Diary;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
class DiaryController extends Controller
{
    public function diaryIndex() {
        $diaries = Diary::get();
        $user = Auth::user();
        $userPHP = $user;
        return view('diaries.diaryIndex', ['diaries' => $diaries])->with('userPHP', $userPHP);
    }
    public function diaryDetail($id) {
        $diary = Diary::find($id);
        $user = Auth::user();
        $userPHP = $user;
        return view('diaries.diaryDetail', ['diary' => $diary])->with('userPHP', $userPHP);
    }
    public function diaryMake() {
        $data = session()->get('diary_data', []);
        $user = Auth::user();
        $userPHP = $user;
        return view('diaries.diaryMake', compact('data'))->with('userPHP', $userPHP);
    }
    public function diaryMake_submit(DiaryRequest $request) {
        $data = $request->all();
        if($request->hasFile('image1')) {
            $path1 = $request->file('image1')->store('temp', 'public');
            $data['image_path1'] = $path1;
        }
        if($request->hasFile('image2')) {
            $path2 = $request->file('image2')->store('temp', 'public');
            $data['image_path2'] = $path2;
        }
        // アップロードされたファイルオブジェクトを削除
        unset($data['image1'], $data['image2']);
    
        session(['diary_data' => $data]);
        return redirect()->route('diaries.diaryConfirm');
    }
    public function diaryConfirm() {
        $data = session('diary_data');
        $user = Auth::user();
        $userPHP = $user;
        return view('diaries.diaryConfirm', ['data' => $data]);
    }
    public function diaryConfirm_submit(Request $request) {
        // セッションからデータを取得
        $data = $request->session()->get('diary_data');

        // セッションのデータが存在する場合のみ処理を実行
        if($data) {
            // データベースに登録
            $diary = new Diary();
            $diary->user_id = auth()->id();
            $diary->title = $data['title'];
            $diary->area = $data['area'];
            $diary->start_date = $data['start_date'];
            $diary->end_date = $data['end_date'];

            // 日記の内容をそれぞれのカラムに保存
            $i = 1;
            $summary_content = "";
            $diary_content = "";
            while (isset($data['summary_day' . $i]) && isset($data['diary_day' . $i])) {
                $summary_content .= $data['summary_day' . $i] . " ";
                $diary_content .= $data['diary_day' . $i] . " ";
                $i++;
            }
            $diary->summary_day = trim($summary_content);
            $diary->diary_day = trim($diary_content);

            // 画像のアップロード処理
            if (isset($data['image_path1'])) {
                $newPath1 = 'images/' . basename($data['image_path1']);
                Storage::disk('public')->move($data['image_path1'], $newPath1);
                $diary->image1 = $newPath1;
            }
            if (isset($data['image_path2'])) {
                $newPath2 = 'images/' . basename($data['image_path2']);
                Storage::disk('public')->move($data['image_path2'], $newPath2);
                $diary->image2 = $newPath2;
            }

            $diary->save();

            // セッションからデータを削除
            session()->forget('diary_data');

            return redirect()->route('diaries.diaryComplete');
        }
        // セッションのデータが存在しない場合のエラーハンドリング
        abort(404);
    }
    public function diaryComplete() {
        $data = session()->get('diary_data', []);
        return view('diaries.diaryComplete', compact('data'));
    }
}