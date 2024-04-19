<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/skills', [App\Http\Controllers\HomeController::class, 'skill'])->name('skills');
Route::get('/projects', [App\Http\Controllers\HomeController::class, 'project'])->name('projects');
Route::get('/details', [App\Http\Controllers\HomeController::class, 'user_detail'])->name('user-details');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'loginForm'])->name('login');
Route::post('/securelogin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('securelogin');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//


//admin section
Route::
        namespace('App\Http\Controllers\Admin')->middleware('auth')->group(function () {
            Route::name('admin.')->prefix('admin')->group(function () {
                Route::get('/', 'DashboardController@index')->name('dashboard');

                Route::name('personal-info.')->prefix('personal-info')->group(function () {
                    Route::get('/', 'DashboardController@personal_info')->name('index');
                    Route::post('/', 'DashboardController@personal_info_update')->name('update');
                });

                Route::name('skills.')->prefix('skills-management')->group(function () {
                    Route::get('/', 'SkillController@index')->name('index');
                    Route::get('/add', 'SkillController@add')->name('add');
                    Route::get('/edit/{id}', 'SkillController@edit')->name('edit');
                    Route::post('/store', 'SkillController@store')->name('store');
                    Route::put('/update/{id}', 'SkillController@update')->name('update');
                    Route::post('/delete', 'SkillController@destroy')->name('destroy');
                });
                Route::name('projects.')->prefix('projects-management')->group(function () {
                    Route::get('/', 'ProjectController@index')->name('index');
                    Route::get('/add', 'ProjectController@add')->name('add');
                    Route::get('/edit/{id}', 'ProjectController@edit')->name('edit');
                    Route::post('/store', 'ProjectController@store')->name('store');
                    Route::put('/update/{id}', 'ProjectController@update')->name('update');
                    Route::post('/delete', 'ProjectController@destroy')->name('destroy');
                });


            });



        });

