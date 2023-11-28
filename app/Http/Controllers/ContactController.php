<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContentSendmail;


class ContactController extends Controller
{
  public function index()
  {
    return Inertia::render('contacts/index');
    // return Inertia::render('contacts/thanks');
  }

  // public function confirm(Request $request)
  // {
  //   return Inertia::render('contacts/thanks');
  // }

  public function send(Request $request)
  {    
    // バリデーション実行
    $requestValue = [
      'email' => $request->email,
      'title' => $request->title,
      'text' => $request->text
    ];
    $rules = [
      'email' => 'required|email',
      'title' => 'required',
      'text' => 'required',
    ];
    $validator = Validator::make($requestValue, $rules);
    if ($validator->fails()) {
      return to_route('top');
    } else {
      // 開発中のみコメントアウト(メールが飛ばないように)
      // Mail::to($requestValue['email'])->send(new ContentSendmail($requestValue));
      // 開発中のみコメントアウト(メールが飛ばないように)
      
      Contact::create([
        'email' => $request->email,
        'title' => $request->title,
        'text' => $request->text,
        'is_completed' => 0
      ]);
    }
    //再送信を防ぐためにトークンを再発行
    $request->session()->regenerateToken();
    //送信完了ページのviewを表示
    return to_route('contact.completion');
  }

  public function completion()
  {
    return Inertia::render('contacts/completion');
  }
}
