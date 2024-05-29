<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
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
    
    Route::post('/posts/{post}/review',  [NavigationController::class, 'reviewView'])->name('review');
    Route::post('/review/{postid}/post',  [NavigationController::class, 'reviewPost'])->name('review.post');
    

    Route::get('/uploader', [NavigationController::class, 'onlyUpload'])->name('onlyUpload');
    Route::get('/reviews', [NavigationController::class, 'review'])->name('reviews');
    
    Route::get('/contact', [NavigationController::class, 'contact'])->name('contact');
    Route::post('/contact', [NavigationController::class, 'contactPost'])->name('contact.post');

    Route::get('/about', [NavigationController::class, 'about'])->name('about');
    
    Route::get('/messages', [NavigationController::class, 'showMessages'])->name('showMessages');

    Route::post('/contentUpload',  [NavigationController::class, 'contentUpload'])->name('content.post');

    Route::get('/assignment', [NavigationController::class, 'assignmentView'])->name('assignment');

    Route::post('/assignment', [NavigationController::class, 'assignmentPost'])->name('assignment.post');

});
