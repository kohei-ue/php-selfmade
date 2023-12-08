<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
class UserController extends Controller
{
    public function userinfo($user_id) {
        $user = Auth::user();
        $plans = Plan::where('user_id',$user_id)->get();
        $likePlans = DB::table('likes')->where('likes.user_id',$user_id)->where('favorite',1)->leftJoin('plans','plans.id','=','likes.plan_id')->leftJoin('users','users.id','=','plans.user_id')->get();

        return view('users.userInfo',['user'=>$user,'plans'=>$plans,'likePlans'=>$likePlans,]);
    }
    public function updatePlan(Request $request, $id) {
        $plan = Plan::find($id);
    
        // リクエストからデータを更新
        $validated = $request->validate([
            'title' => 'required|max:255',
            'date' => 'required',
            'money' => 'required',
            'traffic' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
        ]);
        // データの更新
        $plan->title = $request->input('title');
        $plan->date = $request->input('date');
        $plan->money = $request->input('money');
        $plan->traffic = $request->input('traffic');
        $plan->body = $request->input('body');

        $plan->save();

        return response()->json(['success' => 'Plan updated successfully']);
    }
}