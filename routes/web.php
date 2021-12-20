<?php

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/users', 'UsersController@index')->name('users');
//Route::get('/users/update/{id}', 'UsersController@edit');
Route::get('/users/new', 'UsersController@create')->name('users.add')->middleware('admin_access');
Route::post('/users/new', 'UsersController@store')->name('users.store')->middleware('admin_access');
Route::get('/users/profile/{id}', 'UsersController@show')->name('users.show')->middleware('chef_virgile_access');
Route::post('/users/update/{id}', 'UsersController@update')->name('users.update')->middleware('user_access');
Route::get('/users/delete/{id}', 'UsersController@delete')->name('users.delete')->middleware('admin_access');
Route::post('/users/update-password', 'UsersController@edit_password')->name('users.edit-password');

Route::get('/visiteurs/profile/download/{id}', 'VisiteursController@downloadQrcode')->name('download-qrcode');
Route::get('/visiteurs', 'VisiteursController@index')->name('visiteurs');
Route::get('/visisteurs/new', 'VisiteursController@create')->name('visiteurs.add')->middleware('admin_access');
Route::post('/visisteurs/new', 'VisiteursController@store')->name('visiteurs.store')->middleware('admin_access');
Route::get('/visiteurs/profile/{id}', 'VisiteursController@show')->name('visiteurs.show');
Route::post('/visiteurs/update/{id}', 'VisiteursController@update')->name('visiteurs.update');
Route::get('/visiteurs/delete/{id}', 'VisiteursController@delete')->name('visiteurs.delete')->middleware('admin_access');
Route::post('/visiteurs/generete/qrcode{id}', 'VisiteursController@generer_qrcode')->name('generate_qrcode_visiteurs');

Route::get('/historique', 'HistoriqueController@index')->name('historique');
Route::get('/historique/visiteur/{id}', 'HistoriqueController@show')->name('historique.visiteur');

Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@auth')->name('auth');
Route::get('/logout', 'LoginController@logout')->name('logout');

//Auth::routes(['register' => false, 'reset' => false]);

//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes(['register'=> false, 'reset'=> false]);

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', function () {

    CarbonPeriod::macro('middle', function () {
        return $this->getStartDate()->average($this->getEndDate());
      });
      return CarbonPeriod::since('12:00:00')->until('12:10:00')->middle();

    
});

