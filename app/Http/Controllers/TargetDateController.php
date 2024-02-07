<?php

namespace App\Http\Controllers;

use App\Models\TargetDate;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\CountDayController;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreTargetDateRequest;

class TargetDateController extends Controller
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
    public function create()
    {
      // ログインフラグ
      $isLoggedIn = Auth::check();
      return Inertia::render('TargetDate/Create', [
        'isLoggedIn' => $isLoggedIn,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTargetDateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTargetDateRequest $request)
    {
      $userId = Auth::id();
      // $request->validate([
      //   'title' => 'required',
      // ]);
      // if($errors->any()){
      //   return response()->json($errors->all(), 422);
      // }
      TargetDate::create([
        'title' => $request->title,
        'target_date' => $request->targetDate,
        'target_date_type' => $request->targetDateType,
        'user_id' => $userId
      ]);
      return to_route('top')
        ->with([
            'message' => '登録しました。',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TargetDate $targetDate)
    {
      // ログインフラグ
      $isLoggedIn = Auth::check();
      
      // ターゲットカウント計算
      $targetDateCount = CountDayController::dayCount($targetDate->target_date);
      $targetDate->target_date_count = $targetDateCount;

      $memories = DB::table('memories')->where('user_id',Auth::id())->where('date_id', $targetDate->id)->get();

      return Inertia::render('TargetDate/Show', [
        'isLoggedIn' => $isLoggedIn,
        'targetDate' => $targetDate,
        'memories' => $memories
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Models\TargetDate  $targetDate
     * @return \Illuminate\Http\Response
     */
    public function edit(TargetDate $targetDate)
    {
      // ログインチェック
      $isLoggedIn = Auth::check();
      return Inertia::render('TargetDate/Edit',[
        'isLoggedIn' => $isLoggedIn,
        'targetDate' => $targetDate
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTargetDateRequest $request, TargetDate $targetDate)
    {
      $targetDate->title = $request->title;
      $targetDate->target_date = $request->targetDate;
      $targetDate->target_date_type = $request->targetDateType;
      $targetDate->save();

      return to_route('top')
        ->with([
            'message' => '更新しました。',
            'status' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TargetDate $targetDate)
    {
      $targetDate->delete();
      return to_route('top')
      ->with([
          'message' => '削除しました。',
          'status' => 'danger'
      ]);
    }
}
