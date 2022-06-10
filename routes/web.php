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

Route::get('/home', function () {
    return view('home');
});
//Admin
Route::namespace('Admin')->group(function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'AdminController@index')->name('admin.home');

        Route::prefix('category')->group(function() {

            Route::get('/','CategoryController@index')->name('admin.category.index');
            
            Route::get('/create','CategoryController@create') ->name('admin.category.create');
            
            Route::post('/store','CategoryController@store')->name('admin.category.store');
            
            Route::get('/edit/{id}','CategoryController@edit')->name('admin.category.edit');

            Route::post('/update/{id}','CategoryController@update')->name( 'admin.category.update');

            Route::get('/delete/{id}','CategoryController@delete') ->name('admin.category.delete');
        });
        Route::prefix('menu')->group(function() {

            Route::get('/','MenuController@index')->name('admin.menu.index');
            
            Route::get('/create','MenuController@create') ->name('admin.menu.create');
            
            Route::post('/store','MenuController@store')->name('admin.menu.store');
            
            Route::get('/edit/{id}','MenuController@edit')->name('admin.menu.edit');

            Route::post('/update/{id}','MenuController@update')->name( 'admin.menu.update');

            Route::get('/delete/{id}','MenuController@delete') ->name('admin.menu.delete');
        });
        Route::prefix('product')->group(function() {

            Route::get('/','ProductController@index')->name('admin.product.index');
            
            Route::get('/create','ProductController@create') ->name('admin.product.create');
            
            Route::post('/store','ProductController@store')->name('admin.product.store');
            
            Route::get('/edit/{id}','ProductController@edit')->name('admin.product.edit');

            Route::post('/update/{id}','ProductController@update')->name( 'admin.product.update');

            Route::get('/delete/{id}','ProductController@delete') ->name('admin.product.delete');
        });
        Route::prefix('slider')->group(function() {

            Route::get('/','SliderController@index')->name('admin.slider.index');
            
            Route::get('/create','SliderController@create') ->name('admin.slider.create');
            
            Route::post('/store','SliderController@store')->name('admin.slider.store');
            
            Route::get('/edit/{id}','SliderController@edit')->name('admin.slider.edit');

            Route::post('/update/{id}','SliderController@update')->name( 'admin.slider.update');

            Route::get('/delete/{id}','SliderController@delete') ->name('admin.slider.delete');
        });
        Route::prefix('setting')->group(function() {

            Route::get('/','SettingController@index')->name('admin.setting.index');
            
            Route::get('/create','SettingController@create') ->name('admin.setting.create');
            
            Route::post('/store','SettingController@store')->name('admin.setting.store');
            
            Route::get('/edit/{id}','SettingController@edit')->name('admin.setting.edit');

            Route::post('/update/{id}','SettingController@update')->name( 'admin.setting.update');

            Route::get('/delete/{id}','SettingController@delete') ->name('admin.setting.delete');
        });
        Route::prefix('users')->group(function() {

            Route::get('/','UserController@index')->name('admin.user.index');
            
            Route::get('/create','UserController@create') ->name('admin.user.create');
            
            Route::post('/store','UserController@store')->name('admin.user.store');
            
            Route::get('/edit/{id}','UserController@edit')->name('admin.user.edit');

            Route::post('/update/{id}','UserController@update')->name( 'admin.user.update');

            Route::get('/delete/{id}','UserController@delete') ->name('admin.user.delete');
        });
        Route::prefix('roles')->group(function() {

            Route::get('/','RoleController@index')->name('admin.role.index');
            
            Route::get('/create','RoleController@create') ->name('admin.role.create');
            
            Route::post('/store','RoleController@store')->name('admin.role.store');
            
            Route::get('/edit/{id}','RoleController@edit')->name('admin.role.edit');

            Route::post('/update/{id}','RoleController@update')->name( 'admin.role.update');

            Route::get('/delete/{id}','RoleController@delete') ->name('admin.role.delete');
        });
        Route::prefix('permissions')->group(function(){
            Route::get('/create', [
                'as' => 'admin.permissions.create',
                'uses'=> 'PermissionsController@createPermissions',
            ]);
            Route::post('/store', [
                'as' => 'admin.permissions.store',
                'uses'=> 'PermissionsController@store',
            ]);
        });
    });

});
