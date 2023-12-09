<?php

namespace App\Http\Controllers;

use App\Models\TargetDate;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\CountDayController;

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
        'isLoggedIn' => $isLoggedIn
      ]);
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
    public function show(TargetDate $targetDate)
    {
      // ログインフラグ
      $isLoggedIn = Auth::check();
      
      // ターゲットカウント計算
      $targetDateCount = CountDayController::dayCount($targetDate->target_date);
      $targetDate->target_date_count = $targetDateCount;

      return Inertia::render('TargetDate/Show', [
        'isLoggedIn' => $isLoggedIn,
        'targetDate' => $targetDate
      ]);
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
