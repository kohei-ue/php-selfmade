<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Http\Requests\ContactRequest;
use App\Models\Post;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
    public function board() {
        $posts = Post::with('user')->orderBy('created_at','desc')->get();
        return view('extras.board', compact('posts'));
    }
    public function store(Request $request) {
        $request->validate(['message' => 'required']);
        Post::create([
            'user_id' => Auth::user()->id,
            'message'=> $request->message,
        ]);
        return redirect('/board');
    }
    public function reply(Request $request, Post $post) {
        $request->validate(['message' => 'required']);
        $post->replies()->create([
            'user_id' => Auth::user()->id,
            'message' => $request->message,
            // 他の必要なフィールド
        ]);
        return redirect()->back();
    }

    public function siteInfo() {
        return view('extras.siteInfo');
    }
    public function FAQ() {
        return view('extras.FAQ');
    }

    public function contact() {
        $user = Auth::user();
        return view('extras.contact', ['user'=> $user]);
    }
    public function contactForm(ContactRequest $request){
        $validatedData = $request->validated();

        // 入力データをセッションに保存
        Session::put('contact_data', $validatedData);

        return redirect()->route('extras.confirm');
    }
    public function confirm() {
        $user = Auth::user();
        return view('extras.confirm', ['user'=> $user]);
    }
    public function confirmForm(Request $request){
        // セッションからデータを取得
        $contactData = $request->session()->get('contact_data');

        // セッションのデータが存在する場合のみ処理を実行
        if($contactData){
            $contact = new Contact();
            $contact->name = $contactData['name'];
            $contact->tel = $contactData['tel'];
            $contact->email = $contactData['email'];
            $contact->body = $contactData['body'];
            $contact->save();

            Session::forget('contact_data');

            return redirect()->route('extras.complete');
        }
        abort(404);
    }
    public function complete(){
        return view('extras.complete');
    }

    public function userAgreement() {
        return view('extras.userAgreement');
    }
    public function privacyPolicy() {
        return view('extras.privacyPolicy');
    }
    public function sitemap() {
        return view('extras.sitemap');
    }
}