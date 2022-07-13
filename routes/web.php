<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissonController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@loginAction');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::get('document_folders/delete/{id}','DocumentFolderController@delete')->name('document_folders.delete');
    Route::resource('document_folders','DocumentFolderController');
    Route::get('/','DocumentFolderController@index')->name('document_folders.index');
    Route::get('documents/list/{id}','DocumentsController@listByDocFolder')->name('documents.list');
    Route::get('documents/delete/{id}','DocumentsController@delete')->name('documents.delete');
    Route::resource('documents','DocumentsController');
    Route::resource('fiscal_years','FiscalYearController');

    //User
Route::get('admin',[UserController::class,'dashboard'])->name('dashboard');
Route::get('user',[UserController::class,'show'])->name('user');
Route::post('insertuser',[UserController::class,'Insert'])->name('insertuser');
Route::post('useredit',[UserController::class,'Edit'])->name('useredit');
Route::get('userdelete',[UserController::class,'Delete'])->name('userdelete');
Route::get('useredit',[UserController::class,'UserEdit'])->name('useredit');
//Role
Route::get('role',[RoleController::class,'show']);
Route::POST('roleedit',[RoleController::class,'edit']);
Route::post('insertrole',[RoleController::class,'Insert']);
Route::get('roledelete',[RoleController::class,'Delete']);
//Peermisson
Route::get('permisson',[PermissonController::class,'show']);
Route::post('insertpermisson',[PermissonController::class,'Insert']);
Route::POST('permissonedit',[PermissonController::class,'Edit']);
Route::get('permissondelete',[PermissonController::class,'Delete']);


});
