<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavigationController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::get('/register', [AuthController::class, 'registerView'])->name('register');
Route::post('/register', [AuthController::class, 'registerAction'])->name('register.post');
Route::post('/login', [AuthController::class, 'loginAction'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/completeprofile', [NavigationController::class, 'completeprofile'])->name('completeprofile');
Route::post('/completeprofile', [NavigationController::class, 'completeprofilePost'])->name(
    'completeprofile.post');


Route::group(['middleware'=>'auth'], function(){
    Route::get('/content', [NavigationController::class, 'showFeed'])->name('showFeed');
    Route::post('/content',  [NavigationController::class, 'upload'])->name('upload.post');
    Route::post('/posts/{post}/like',  [NavigationController::class, 'like'])->name('like.post');
    
    Route::post('/posts/{post}/comment',  [NavigationController::class, 'commentView'])->name('comment');
    Route::post('/comment/{postid}/post',  [NavigationController::class, 'commentPost'])->name('comment.post');
});
