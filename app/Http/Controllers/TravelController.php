<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Http\Requests\PlanMakeRequest;
use App\Models\Plan;
use App\Models\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
class TravelController extends Controller
{
    public function index() {
        $user =Auth::user();
        if(empty($user)){
            return redirect('/');
        }

        $latestPlans = Plan::orderBy('id','desc')->take(5)->get();
        $popularPlans = DB::table('plans')
                            ->leftJoin('likes', 'plans.id', '=', 'likes.plan_id')
                            ->leftJoin('users', 'plans.user_id','=', 'users.id')
                            ->select('plans.*', 'users.name as user_name', DB::raw('COUNT(likes.id) as likes_count'))
                            ->where('likes.favorite', 1)
                            ->groupBy('plans.id', 'user_name')
                            ->orderBy('likes_count', 'desc')
                            ->take(5)->get();

        return view('travels.index', [
            'user' => $user,
            'latestPlans' => $latestPlans,
            'popularPlans' => $popularPlans
        ]);
    }


    public function planIndex() {
        $userPHP =Auth::user();
        if(empty($userPHP)){
            return redirect('/');
        }
        return view('travels.planIndex');
    }
    public function showPlans($name)
    {
        // dd(request()->all());

        $prefecture = urldecode($name);
        $query = Plan::where('area', $prefecture);

        $prefectures=["北海道","青森県","岩手県","秋田県","宮城県","山形県","福島県","栃木県","群馬県","茨城県","新潟県","埼玉県","千葉県","東京都","神奈川県","長野県","山梨県","富山県","岐阜県","石川県","静岡県","愛知県","三重県","福井県","滋賀県","京都府","奈良県","大阪府","和歌山県","兵庫県","鳥取県","岡山県","島根県","広島県","山口県","愛媛県","高知県","香川県","徳島県","福岡県","大分県","佐賀県","長崎県","熊本県","宮崎県","鹿児島県","沖縄県"];
            $selectOptions = [];
            for($i=0;$i<count($prefectures);$i++){
                if($prefectures[$i]==$prefecture){
                    array_push($selectOptions,"<option value='".$prefectures[$i]."' selected>".$prefectures[$i]."</option>");
                }else{
                    array_push($selectOptions,"<option value='".$prefectures[$i]."'>".$prefectures[$i]."</option>");
                }
            }

        // ソートの処理
        // if (request()->has('sort_by')) {
        if (!empty($_GET['?sort_by'])) {
            // $sortBy = request('sort_by');
            // $order = request('order', 'asc');
            $sortBy = $_GET['?sort_by'];
            $order = $_GET['order'];

            switch ($sortBy) {
                case 'date':
                    if($_GET['order']=='asc'){
                        $query = Plan::where('area', $prefecture)->orderByRaw("FIELD (date, '日帰り', '一泊二日', '二泊三日', '三泊四日', '四泊五日', '五泊六日', '六泊以上')");
                    // $orderValues = ["日帰り", "一泊二日", "二泊三日", "三泊四日", "四泊五日", "五泊六日", "六泊以上"];
                    // $query->orderByRaw("FIELD(date, ?)", [$orderValues]);
                        break;
                    }else{
                        $query = Plan::where('area', $prefecture)->orderByRaw("FIELD (date, '六泊以上' , '五泊六日' , '四泊五日' , '三泊四日' , '二泊三日' , '一泊二日' , '日帰り')");
                        break;
                    }
                case 'money':
                    if($_GET['order']=='asc'){
                    // $orderValues = ["~5000円", "5000~10000円", "10001~20000円", "20001~30000円", "30001~40000円", "40001~50000円", "50001~60000円", "60001~70000円", "70001~80000円", "80001~90000円", "90001~100000円", "100001円以上"];
                    // $query->orderByRaw("FIELD(money, ?)", [$orderValues]);
                    $query = Plan::where('area', $prefecture)->orderByRaw("FIELD(money, '~5000円', '5000~10000円', '10001~20000円', '20001~30000円', '30001~40000円', '40001~50000円', '50001~60000円','60001~70000円','70001~80000円','80001~90000円','90001~100000円','100001円以上')");
                        break;
                    }else{
                        $query = Plan::where('area', $prefecture)->orderByRaw("FIELD(money,'100001円以上','90001~100000円','80001~90000円','70001~80000円','60001~70000円','50001~60000円','40001~50000円', '30001~40000円', '20001~30000円','10001~20000円','5000~10000円', '~5000円')");
                        break;
                    }
                case 'traffic':
                    if($_GET['order']=='asc'){
                    // $orderValues = ["徒歩", "電車、鉄道メイン", "バスメイン", "車(レンタカー)メイン"];
                    // $query->orderByRaw("FIELD(traffic, ?)", [$orderValues]);
                    $query = Plan::where('area', $prefecture)->orderByRaw("FIELD (traffic, '車(レンタカー)メイン', 'バスメイン' , '電車、鉄道メイン' ,'徒歩')");
                    break;
                    }else{
                        $query = Plan::where('area', $prefecture)->orderByRaw("FIELD (traffic, '徒歩' , '電車、鉄道メイン' , 'バスメイン' , '車(レンタカー)メイン')");
                        break;
                    }
                default:
                    $query->orderBy($sortBy, $order);
                    break;
                }
            }else{
                $query = Plan::where('area', $prefecture);
            }
        // dd($query->toSql());

        $plans = $query->get();

        $user = Auth::user();
        $plan = $query->first();
        $visitorRecode = DB::table('likes')->select("user_id")->where('plan_id',$plan->id)->groupBy('user_id')->get();
        $visitorCount = $visitorRecode->count();
        $userPHP = $user;
        logs()->alert($userPHP);
        // $like=Like::where('plan_id', $plans->id)->where('user_id', auth()->user()->id)->first();

        return view('travels.plan_page', [
            'name' => $name,
            'plans' => $plans,
            'user' => $user,
            // 'likes' => $like
        ])->with(['userPHP'=>$userPHP,'visitorCount'=>$visitorCount, 'selectOptions'=>$selectOptions]);
    }


    public function planMake() {
        $data = session()->get('plan_data', []);
        $user = Auth::user();
        $userPHP = $user;
        return view('travels.planMake', compact('data'))->with('userPHP', $userPHP);
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
        $user = Auth::user();
        $userPHP = $user;
        return view('travels.planConfirm', ['data' => $data])->with('userPHP', $userPHP);
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
            // session()->forget('plan_data');

            $planId = $plan->id;
            $planUrl = url('/plans/'. $planId);

            session(['plan_url'=> $planUrl]);

            return redirect()->route('travels.planComplete');
        }
        // セッションのデータが存在しない場合のエラーハンドリング
        abort(404);
    }
    public function planComplete() {
        $data = session()->get('plan_data', []);
        // $lastPlanId = session('last_plan_id');
        // $lastPlan = Plan::find($lastPlanId);
        return view('travels.planComplete', ['data' => $data]);
        // compact('data')
    }


    public function adminIndex() {
        $user = Auth::user();
        $userPHP = $user;
        return view('admins.adminIndex')->with('userPHP', $userPHP);
    }
    public function adminUserlist() {
        $users = Login::all();
        $user = Auth::user();
        $userPHP = $user;
        return view('admins.adminUserlist', compact('users'))->with('userPHP', $userPHP);
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