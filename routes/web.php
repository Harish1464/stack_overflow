<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\CommentController;

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

Route::get('/', [QuestionController::class, 'index'])->name('forum-page');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/questions', [QuestionController::class, 'index'])->name('question.index');
Route::get('/question/show/{question}', [QuestionController::class, 'show'])->name('question.show');
Route::group(['middleware'=> 'auth'], function(){
    Route::get('/question/add', [QuestionController::class, 'create'])->name('question.create');
    Route::post('/question/store', [QuestionController::class, 'store'])->name('question.store');
    Route::get('/question/edit/{question}', [QuestionController::class, 'edit'])->name('question.edit');
    Route::post('/question/update/{question}', [QuestionController::class, 'update'])->name('question.update');
    Route::get('/question/delete/{question}', [QuestionController::class, 'destroy'])->name('question.delete');

});


Route::get('/comment/edit/{comment}', [CommentController::class, 'edit'])->name('comment.edit');
Route::post('/comment/update/{comment}', [CommentController::class, 'update'])->name('comment.update');
Route::get('/comment/delete/{comment}', [CommentController::class, 'destroy'])->name('comment.delete');

Route::post('comment/create/{question}',[CommentController::class, 'addQuestionComment'])->name('questioncomment.store');

Route::post('reply/create/{comment}',[CommentController::class, 'addReplyComment'])->name('replycomment.store');
