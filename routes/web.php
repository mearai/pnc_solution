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

Route::get('/', 'CompanyController@index')->name('all.company')->middleware('auth');;

// Compines Route
Route::get('/companies', 'CompanyController@index')->name('all.company')->middleware('auth');;
Route::get('/companies/add', 'CompanyController@create')->name('add.company')->middleware('auth');;
Route::post('/companies/create', 'CompanyController@store')->name('create.company')->middleware('auth');;
Route::get('/companies/show/{id}', 'CompanyController@show')->name('show.company')->middleware('auth');
Route::get('/companies/delete/{id}', 'CompanyController@destroy')->name('delete.company')->middleware('auth');
Route::get('/companies/edit/{id}', 'CompanyController@edit')->name('edit.company')->middleware('auth');;
Route::post('/companies/update/{id}', 'CompanyController@update')->name('update.company')->middleware('auth');


// Employee route

Route::get('/employes/', 'EmployeController@index')->name('all.employes')->middleware('auth');;
Route::get('/employes/add', 'EmployeController@create')->name('add.employes')->middleware('auth');;
Route::post('/employes/create', 'EmployeController@store')->name('create.employes')->middleware('auth');;
Route::get('/employes/show/{id}', 'EmployeController@show')->name('show.employes')->middleware('auth');
Route::get('/employes/delete/{id}', 'EmployeController@destroy')->name('delete.employes')->middleware('auth');
Route::get('/employes/edit/{id}', 'EmployeController@edit')->name('edit.employes')->middleware('auth');;
Route::post('/employes/update/{id}', 'EmployeController@update')->name('update.employes')->middleware('auth');;


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});
