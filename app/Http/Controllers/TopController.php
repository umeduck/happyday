<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\CountDayController;
use Illuminate\Support\Facades\DB;


class TopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // ログインフラグ
      $isLoggedIn = Auth::check();

      if ($isLoggedIn) {
        // ユーザー情報
        $userInfo = DB::table('users')->where('id',Auth::id())->get(['name','birthday']);
        $count = CountDayController::dayCount($userInfo[0]->birthday);

        // ターゲットカウント計算
        $targetDates = DB::table('target_dates')->where('user_id',Auth::id())->get(['id','title','target_date','target_date_type']);
        foreach ($targetDates as $targetDate) {
          $targetDateCount = CountDayController::dayCount($targetDate->target_date);
          $targetDate->target_date_count = $targetDateCount;
        }

        return Inertia::render('Top', [
          'isLoggedIn' => $isLoggedIn,
          'count' => $count,
          'userInfo' => $userInfo,
          'targetDates' => $targetDates
        ]);
      }
      return Inertia::render('Top', [
        'isLoggedIn' => $isLoggedIn
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
