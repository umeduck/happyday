<?php

namespace App\Http\Controllers;

use App\Models\Memory;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

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
    public function create()
    {
      // ログインフラグ
      $isLoggedIn = Auth::check();
      return Inertia::render('Memory/Create', [
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
      dd($request->file('file'),$request);
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

      return Inertia::render('Memory/Show', [
        'isLoggedIn' => $isLoggedIn,
        'memory' => $memory
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
