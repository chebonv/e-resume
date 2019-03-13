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

Route::resource('/filter','FilterController');
Route::resource('/education','EducationController');
Route::resource('/extra-space','ExtraSpaceController');
Route::resource('/skill','SkillController');
Route::resource('/summary','SummaryController');
Route::resource('/work-experience','WorkExperienceController');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
