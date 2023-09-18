<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\PlanMakeRequest;
use App\Http\Requests\DiaryRequest;
use App\Models\Plan;
use App\Models\Diary;
use App\Models\Login;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
class TravelController extends Controller
{
    public function index() {
        return view('travels.index');
    }


    public function planIndex() {
        return view('travels.planIndex');
    }
    public function showPlans($name)
    {
        // dd(request()->all());
    
        $prefecture = urldecode($name);
        $query = Plan::where('area', $prefecture);

        // ソートの処理
        if (request()->has('sort_by')) {
            $sortBy = request('sort_by');
            $order = request('order', 'asc');

            switch ($sortBy) {
                case 'date':
                    $orderValues = ["日帰り", "一泊二日", "二泊三日", "三泊四日", "四泊五日", "五泊六日", "六泊以上"];
                    $query->orderByRaw("FIELD(date, ?)", [$orderValues]);
                    break;
                case 'money':
                    $orderValues = ["~5000円", "5000~10000円", "10001~20000円", "20001~30000円", "30001~40000円", "40001~50000円", "50001~60000円", "60001~70000円", "70001~80000円", "80001~90000円", "90001~100000円", "100001円以上"];
                    $query->orderByRaw("FIELD(money, ?)", [$orderValues]);
                    break;
                case 'traffic':
                    $orderValues = ["徒歩", "電車、鉄道メイン", "バスメイン", "車(レンタカー)メイン"];
                    $query->orderByRaw("FIELD(traffic, ?)", [$orderValues]);
                    break;
                default:
                    $query->orderBy($sortBy, $order);
                    break;
                }
            }
        // dd($query->toSql());

        $plans = $query->get();

        $user = Auth::user();

        return view('travels.plan_page', [
            'name' => $name,
            'plans' => $plans,
            'user' => $user, 
        ]);
    }


    public function planMake() {
        $data = session()->get('plan_data', []);
        return view('travels.planMake', compact('data'));
    }
    public function planMake_submit(PlanMakeRequest $request) {
        $data = $request->all();
        if($request->hasFile('image')) {
            $path = $request->file('image')->store('temp', 'public');
            $data['image_path'] = $path;
        }
        // アップロードされたファイルオブジェクトを削除
        unset($data['image']);
        session(['plan_data' => $data]);
        return redirect()->route('travels.planConfirm');
    }
    public function planConfirm() {
        $data = session('plan_data');
        return view('travels.planConfirm', ['data' => $data]);
    }
    public function planConfirm_submit(Request $request) {
        // セッションからデータを取得
        $data = $request->session()->get('plan_data');

        // セッションのデータが存在する場合のみ処理を実行
        if($data) {
            // データベースに登録
            $plan = new Plan();
            $plan->user_id = auth()->id();
            $plan->title = $data['title'];
            $plan->area = $data['area'];
            $plan->date = $data['date'];
            $plan->money = $data['money'];
            $plan->traffic = $data['traffic'];
            // spotのデータをJSON形式で保存
            $spots = [];
            for ($i = 1; $i <= 7; $i++) {
                if (isset($data['spot_day' . $i])) {
                    $spots['day' . $i] = $data['spot_day' . $i];
                }
            }
            $plan->spot = json_encode($spots);

            $plan->body = $data['body'];

            // 画像のアップロード処理
            if (isset($data['image_path'])) {
                $newPath = 'images/' . basename($data['image_path']);
                Storage::disk('public')->move($data['image_path'], $newPath);
                $plan->image = $newPath;
            }

            $plan->save();

            // セッションからデータを削除
            session()->forget('plan_data');

            return redirect()->route('travels.planComplete');
        }
        // セッションのデータが存在しない場合のエラーハンドリング
        abort(404);
    }
    public function planComplete() {
        $data = session()->get('plan_data', []);
        return view('travels.planComplete', compact('data'));
    }


    public function diaryIndex() {
        $diaries = Diary::get();
        return view('travels.diaryIndex', ['diaries' => $diaries]);
    }
    public function diaryDetail($id) {
        $diary = Diary::find($id);
        return view('travels.diaryDetail', ['diary' => $diary]);
    }
    public function diaryMake() {
        $data = session()->get('diary_data', []);
        return view('travels.diaryMake', compact('data'));
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
        return redirect()->route('travels.diaryConfirm');
    }
    public function diaryConfirm() {
        $data = session('diary_data');
        return view('travels.diaryConfirm', ['data' => $data]);
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

            return redirect()->route('travels.diaryComplete');
        }
        // セッションのデータが存在しない場合のエラーハンドリング
        abort(404);
    }
    public function diaryComplete() {
        $data = session()->get('diary_data', []);
        return view('travels.diaryComplete', compact('data'));
    }


    public function adminIndex() {
        return view('admins.adminIndex');
    }
    public function adminUserlist() {
        $users = Login::all();
        return view('admins.adminUserlist', compact('users'));
    }

    public function user_delete($id) {
        $user = Login::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('admins.adminUserlist')->with('success', 'ユーザーを削除しました。');
        } else {
            return redirect()->route('admins.adminUserlist')->with('error', 'ユーザーが見つかりませんでした。');
        }
    }
    public function plan_delete($id) {
        $plan = Plan::find($id);
        if ($plan) {
            $plan->delete();
            return redirect()->route('travels.plan_page')->with('success', 'プランを削除しました。');
        } else {
            return redirect()->route('travels.plan_page')->with('error', 'プランが見つかりませんでした。');
        }
    }
}