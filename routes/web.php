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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login');
    Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Auth\AdminController@index')->name('admin.index');

    Route::get('/company', 'Auth\AdminController@companyIndex')->name('admin.company');
    Route::get('/company/create', 'Auth\AdminController@companyCreate')->name('admin.company.create');
    Route::post('/company/store', 'Auth\AdminController@companyStore')->name('admin.company.store');
    Route::get('/company/edit/{id}', 'Auth\AdminController@companyEdit')->name('admin.company.edit');
    Route::put('/company/update/{id}', 'Auth\AdminController@companyUpdate')->name('admin.company.update');
    Route::get('/company/edit/password/{id}', 'Auth\AdminController@companyEditPass')->name('admin.company.editPass');
    Route::put('/company/update/password/{id}', 'Auth\AdminController@companyUpdatePass')->name('admin.company.updatePass');

    Route::get('/tag', 'Auth\AdminController@tag')->name('admin.tag');
    Route::get('/tag/create', 'Auth\AdminController@tagCreate')->name('admin.tag.create');
    Route::post('/tag/store', 'Auth\AdminController@tagStore')->name('admin.tag.store');
    Route::get('/tag/edit/{id}', 'Auth\AdminController@tagEdit')->name('admin.tag.edit');
    Route::put('tag/update/{id}', 'Auth\AdminController@tagUpdate')->name('admin.tag.update');
    Route::delete('tag/delete/{id}', 'Auth\AdminController@tagDelete')->name('admin.tag.delete');

    Route::get('/category', 'Auth\AdminController@category')->name('admin.category');
    Route::get('/category/create', 'Auth\AdminController@categoryCreate')->name('admin.category.create');
    Route::post('/category/store', 'Auth\AdminController@categoryStore')->name('admin.category.store');
    Route::get('/category/edit/{id}', 'Auth\AdminController@categoryEdit')->name('admin.category.edit');
    Route::put('category/update/{id}', 'Auth\AdminController@categoryUpdate')->name('admin.category.update');
    Route::delete('category/delete/{id}', 'Auth\AdminController@categoryDelete')->name('admin.category.delete');

    Route::get('/salaryForm', 'Auth\AdminController@salaryForm')->name('admin.salaryForm');
    Route::get('/salaryForm/create', 'Auth\AdminController@salaryFormCreate')->name('admin.salaryForm.create');
    Route::post('/salaryForm/store', 'Auth\AdminController@salaryFormStore')->name('admin.salaryForm.store');
    Route::get('/salaryForm/edit/{id}', 'Auth\AdminController@salaryFormEdit')->name('admin.salaryForm.edit');
    Route::put('salaryForm/update/{id}', 'Auth\AdminController@salaryFormUpdate')->name('admin.salaryForm.update');
    Route::delete('salaryForm/delete/{id}', 'Auth\AdminController@salaryFormDelete')->name('admin.salaryForm.delete');
});
