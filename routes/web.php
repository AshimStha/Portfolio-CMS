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

// route to the welcome page
Route::get('/', function () {
    return view('welcome');
});

// route to the abouts page
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
// route to the skills page
Route::get('/skills', [App\Http\Controllers\HomeController::class, 'skill'])->name('skills');
// route to the projects page
Route::get('/projects', [App\Http\Controllers\HomeController::class, 'project'])->name('projects');
// route to the details page
Route::get('/details', [App\Http\Controllers\HomeController::class, 'user_detail'])->name('user-details');

// route to display the admin dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route to display the login form
Route::get('/admin/login', [App\Http\Controllers\Auth\LoginController::class, 'loginForm'])->name('login');
Route::post('/securelogin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('securelogin');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



//admin section routes
Route::
        namespace('App\Http\Controllers\Admin')->middleware('auth')->group(function () {
            Route::name('admin.')->prefix('admin')->group(function () {
                // rout to the admin dashboard page
                Route::get('/', 'DashboardController@index')->name('dashboard');

                Route::name('personal-info.')->prefix('personal-info')->group(function () {
                    // route to display the personal details update page (admin/basic_info/index)
                    Route::get('/', 'DashboardController@personal_info')->name('index');
                    // route to update the personal details for the user
                    Route::post('/', 'DashboardController@personal_info_update')->name('update');
                });

                Route::name('skills.')->prefix('skills-management')->group(function () {
                    // route for the skills index page
                    Route::get('/', 'SkillController@index')->name('index');
                    // route for the skills add form page
                    Route::get('/add', 'SkillController@add')->name('add');
                    // route for the skills edit form page
                    Route::get('/edit/{id}', 'SkillController@edit')->name('edit');
                    // route for saving the skill
                    Route::post('/store', 'SkillController@store')->name('store');
                    // route for updating the skill
                    Route::put('/update/{id}', 'SkillController@update')->name('update');
                    // route to delete a skill
                    Route::post('/delete', 'SkillController@destroy')->name('destroy');
                });
                Route::name('projects.')->prefix('projects-management')->group(function () {
                    // route to show the projects index page
                    Route::get('/', 'ProjectController@index')->name('index');
                    // route to display the add project form
                    Route::get('/add', 'ProjectController@add')->name('add');
                    // route to show the edit project form
                    Route::get('/edit/{id}', 'ProjectController@edit')->name('edit');
                    // route to save a new project
                    Route::post('/store', 'ProjectController@store')->name('store');
                    // route to update a project
                    Route::put('/update/{id}', 'ProjectController@update')->name('update');
                    // route to delete a project
                    Route::post('/delete', 'ProjectController@destroy')->name('destroy');
                });
            });
        });

