<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
class LikeController extends Controller
{
    public function index(Plan $plan,$plan_id){
		$user=auth()->id();
		$likeRecode = DB::table('likes')->where('user_id',$user)->where('plan_id',$plan_id)->first();
		if(empty($likeRecode)){
			DB::table('likes')->insert([
				'plan_id'=>$plan_id,
				'user_id'=>$user,
			]);
			logs()->alert('失敗0');
		}
		$like = DB::table('likes')->where('user_id',$user)->where('plan_id',$plan_id)->first();
		$likesCount = DB::table('likes')->where('plan_id',$plan_id)->where('favorite',1)->get()->count();
		
		return view('travels.favorite')->with(['like'=>$like,'likesCount'=>$likesCount]);
	}

    public function like(Plan $plan, Request $request,$plan_id){
		$user=auth()->id();
		$likeRecode = DB::table('likes')->where('user_id',$user)->where('plan_id',$plan_id)->first();

		if(empty($likeRecode)){
			DB::table('likes')->insert([
				'plan_id'=>$plan_id,
				'user_id'=>$user,
				'favorite'=>1,
			]);
			logs()->alert($likeRecode);
			logs()->alert('失敗');
		}elseif($likeRecode->favorite == 0){
			DB::table('likes')->where('user_id',$user)->where('plan_id',$plan_id)->update([
				'favorite'=>1,
			]);
			logs()->alert($likeRecode->favorite);
			logs()->alert('成功1');
		}else{
			DB::table('likes')->where('user_id',$user)->where('plan_id',$plan_id)->update([
				'favorite'=>0,
			]);
			logs()->alert($likeRecode->favorite);
			logs()->alert('成功2');
		}

		$like = DB::table('likes')->where('user_id',$user)->where('plan_id',$plan_id)->first();
		$likesCount = DB::table('likes')->where('plan_id',$plan_id)->where('favorite',1)->get()->count();

		return view('travels.favorite')->with(['like'=>$like,'likesCount'=>$likesCount]);
    }
}