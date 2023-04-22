<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

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

// Controllerを介さずにView表示
//Route::get('/', function () {
//    return view('dashboard');
//});

//Controllerを介してView表示
//Route::redirect('/', 'article');
//Route::resource('article', ArticleController::class);

// 全カテゴリ記事一覧
Route::get('/articles', [ArticleController::class, 'list'])->name('articles.list');
// カテゴリ別記事一覧
Route::get('/articles/{category_name}/{tag}', [ArticleController::class, 'listByCategory'])->name('articles.list_category');
// 記事詳細
Route::get('/articles/{id}', [ArticleController::class, 'detail'])->name('articles.detail');
