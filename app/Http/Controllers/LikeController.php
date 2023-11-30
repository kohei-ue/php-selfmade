<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Plan;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
class LikeController extends Controller
{
    public function like(Plan $plan, Request $request){
        $like=New Like();
        $like->plan_id=$plan->id;
        $like->user_id=Auth::user()->id;
        $like->save();
        return back();
    }

    public function unlike(Plan $plan, Request $request){
        $user=Auth::user()->id;
        $like=Like::where('plan_id', $plan->id)->where('user_id', $user)->first();
        $like->delete();
        return back();
    }
}