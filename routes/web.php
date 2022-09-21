<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubscripController;
use App\Models\Project;
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
    return view('myhome'); //welcome
});

 Route::resource('blogs','App\Http\Controllers\BlogController');
 Route::resource('comments','App\Http\Controllers\CommentController');
 Route::resource('books','App\Http\Controllers\BookController');
 Route::resource('projects','App\Http\Controllers\ProjectController');
 Route::resource('users',UserController::class);
 Route::resource('subscrips',SubscripController::class);
 Route::get('blog/destroy/{id}',[BlogController::class,'destroy'])->name('blog.destroy'); //for delete blog by <a href=''>


 Route::get('book/destroy/{id}',[BookController::class,'destroy'])->name('book.destroy'); //for delete book by <a href=''>



 Route::get('project/destroy/{id}',[ProjectController::class,'destroy'])->name('project.destroy'); //for delete project by <a href=''>

 //code router
 Route::resource('codes','App\Http\Controllers\CodeController');
 Route::get('/codes/addcode/{id}', [CodeController::class ,'addCode'])->name('codes.add');
 Route::get('code/destroy/{id}',[CodeController::class,'destroy'])->name('code.destroy'); //for delete code by <a href>

 Route::get('/project/design/{project}', function(Project $project ){
     return view('myProjects.design', ['project' =>$project]);
 })->name('myProject.design');

 // for show and dounload zip file
 Route::get('/project/zip/{project}', function(Project $project ){
    return view('myProjects.zipDownload', ['project' =>$project]);
})->name('myProject.zip');

Route::get('projects/{id}',[ProjectController::class , 'downloadZip'])->name('download.zip');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/myhome', [App\Http\Controllers\HomeController::class, 'index'])->name('myhome');


Route::get('/myblogs',[App\Http\Controllers\BlogController::class, 'blogsPage'])->name('main.blogs');


//
