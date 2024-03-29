<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMemoryRequest;
use App\Http\Requests\UpdateMemoryRequest;


class MemoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      // ログインフラグ
      $isLoggedIn = Auth::check();

      // 作成するターゲット日
      $dateId = $request->id;
      return Inertia::render('Memory/Create', [
        'isLoggedIn' => $isLoggedIn,
        'dateId' => $dateId
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMemoryRequest $request)
    {
      // ログインID
      $userId = Auth::id();

      // 画像の取得
      $file = $request->file('file');

      // 画像保存処理
      $hashName = $file->hashName();
      $fname = date('Y-m-d');

      // 画像の保存
      Storage::put('public/images/' . $fname . '/', $file);
      
      // DB登録
      Memory::create([
        'title' => $request->title,
        'text' => $request->text,
        'img_path' => '/storage/images/' . $fname . '/' . $hashName,
        'user_id' => $userId,
        'date_id' => $request->dateId
      ]);
      return to_route('target-date.show', ['target_date' => $request->dateId]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Memory $memory)
    {
      // ログインフラグ
      $isLoggedIn = Auth::check();
      // ログインID
      $loginId = Auth::id();
      // 許可ユーザチェック
      $isPermitUser = $loginId == $memory->user_id ? true : false;
      return Inertia::render('Memory/Show', [
        'isLoggedIn' => $isLoggedIn,
        'memory' => $memory,
        'isPermitUser' => $isPermitUser
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Models\TargetDate  $targetDate
     * @return \Illuminate\Http\Response
     */
    public function edit(Memory $memory)
    {
      // ログインフラグ
      $isLoggedIn = Auth::check();
      // ログインID
      $loginId = Auth::id();

      $isPermitUser = $loginId == $memory->user_id ? true : false;
      return Inertia::render('Memory/Edit', [
        'isLoggedIn' => $isLoggedIn,
        'memory' => $memory
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMemoryRequest $request, Memory $memory)
    {
      // dd($request);
      if($request->file('file')){
        // ファイルの取得
        $file = $request->file('file');
        // ファイル名の作成
        $hashName = $file->hashName();
        $fname = date('Y-m-d');
        $imgPath = '/storage/images/' . $fname . '/' . $hashName;
        // 画像の保存
        Storage::put('public/images/' . $fname . '/', $file);
      }else{
        $imgPath = $request->imgPath;
      }
      // DB更新
      $memory->title = $request->title;
      $memory->text = $request->text;
      $memory->img_path = $imgPath;
      $memory->save();

      return to_route('target-date.show', ['target_date' => $request->dateId]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memory $memory)
    {
      $dateId = $memory->date_id;
      $memory->delete();
      return to_route('target-date.show', ['target_date' => $dateId])
      ->with([
          'message' => '削除しました。',
          'status' => 'danger'
      ]);
    }
}
