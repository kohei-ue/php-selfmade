<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
class ExtraController extends Controller
{
    public function ToNewComer() {
        return view('extras.ToNewComer');
    }
    public function sticky() {
        return view('extras.sticky');
    }
    public function bulletinBoard() {
        return view('extras.bulletinBoard');
    }
}
