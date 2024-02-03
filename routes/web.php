<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TargetDateController;
use App\Http\Controllers\MemoryController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TopController::class, 'index'])->name('top');

//入力ページ
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

//送信処理
Route::post('/contact/thanks', [ContactController::class, 'send'])->name('contact.send');

//送信完了ページ
Route::get('/contact/completion', [ContactController::class, 'completion'])->name('contact.completion');

Route::resource('target-date',TargetDateController::class)
->middleware(['auth','verified']);

Route::resource('memory',MemoryController::class)
->middleware(['auth','verified']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/welcome', function() {
  return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
