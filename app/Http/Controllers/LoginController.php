<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
class LoginController extends Controller
{
    public function login() {
        return view('logins.login');
    }
    public function userLogin(LoginRequest $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // 認証に成功した場合、roleの値をチェックしてリダイレクト
            $user = Auth::user();
            if ($user->role == 1) {
                return redirect()->route('travels.index');
            } elseif ($user->role == 0) {
                return redirect()->route('admins.adminIndex');
            }
        } else {
            // 認証に失敗した場合、ログインページにリダイレクト
            return redirect()->route('logins.login');
        }
    }

    public function register() {
        return view('logins.register');
    }
    public function userRegister(RegisterRequest $request) {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        // フォームから直接role値を受け取るのではなく、登録フォームに応じてroleを設定
        $role = $request->path() == 'register_ad' ? 0 : 1; // 'register_ad'からの登録の場合roleは0、それ以外は1

        // ユーザー登録処理
        User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => $role,
        ]);

        return redirect()->route('logins.register_comp');
    }
    public function register_comp() {
        return view('logins.register_comp');
    }

    public function register_ad() {
        return view('admins.register_ad');
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}