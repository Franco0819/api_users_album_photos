<?php

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
});

// Routes api
Route::get('/api/album/{albumID}/users', 'Api\RelationController@getUsersAlbum')->name('api.album.getUsers');
Route::post('/api/album/permission/store', 'Api\RelationController@storeRelationPermission')->name('api.album.user.permission.store');
Route::delete('/api/album/{albumID}/user/{userID}/permission/{permissionID}/destroy', 'Api\RelationController@destroyRelationPermission')->name('api.album.user.permission.destroy');
Route::put('/api/album/{albumID}/user/{userID}/permission/{permissionID}/update', 'Api\RelationController@updateRelationPermission')->name('api.album.user.permission.update');

Route::get('/api/comments/search',['as' => 'search', 'uses' => 'Api\RelationController@searchComment'])->name('api.comments.search');

// Permission
Route::get('/api/permissions/show', 'Api\PermissionController@show')->name('api.permission.show');
Route::post('/api/permissions/store', 'Api\PermissionController@store')->name('api.permission.store');
Route::put('/api/permissions/{permissionID}/update', 'Api\PermissionController@update')->name('api.permission.update');
Route::delete('/api/permissions/{permissionID}/destroy', 'Api\PermissionController@destroy')->name('api.permission.delete');