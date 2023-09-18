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
    public function userlogin(LoginRequest $request) {
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
        $role = $request->input('role');

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

    public function logout() {
        Auth::logout();
        return redirect('/');
    }
}