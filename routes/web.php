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
Route::resource('branchesServidor','BrancheController'); //terminado
Route::resource('employsServidor','EmployController');//terminado
Route::resource('journalistsServidor','JournalistController'); //terminado
Route::resource('magazinesServidor','MagazineController'); //terminado
Route::resource('branche_magazinesServidor','Branche_magazineController');
Route::resource('copiesServidor','CopyController');//terminado
Route::resource('sectionsServidor','SectionController');//terminado
Route::resource('journalist_magazinesServidor','Journalist_magazineController');
