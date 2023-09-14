<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks',[App\Http\Controllers\TaskController::class, 'index'])->name('tasks');
// tasksにgetリクエストがきたらTaskControllerのindexメソッドを呼び出す このルーティングの名前をtasksとする

Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('task');
// 第1引数には URL パス、第2引数にはアクションを指定
// task に postリクエストがあったとき、TaskControllerクラスのstoreメソッドを呼び出す
// このルーティングにtaskという名前を付けている

Route::delete('/task/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('/task/{task}');
// 上記のように {task} と記述->コントローラ側で変数 $task としてパラメータを取得できる
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
