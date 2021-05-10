<?php
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;
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

Route::get('/', 'PizzaController@index');

//Route::get('/zamowienia', 'PizzaController@pizzagen');

Auth::routes();



Route::get('/home', 'PizzaController@home')->name('home')->middleware('auth');

Route::get('/kontakt', 'PizzaController@kontakt');

Route::get('/zamowienia','PizzaController@zamowienia')->middleware('auth');

Route::get('/profil', 'PizzaController@profil');

Route::post('/doladowanie', array('as' => 'doladowanie', 'uses' => 'PizzaController@doladowanie'));

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/delete', array('as' => 'delete', 'uses' => 'PizzaController@delete'));

Route::post('/pizzagen', array('as' => 'pizzagen', 'uses' => 'PizzaController@pizzagen'));

Route::get('/zamawiam', array('as' => 'zamawiam', 'uses' => 'PizzaController@zamawiam'));

Route::post('/usunPizze', array('as' => 'usunPizze', 'uses' => 'PizzaController@usunPizze'));
Route::post('/dodajPizze', array('as' => 'dodajPizze', 'uses' => 'PizzaController@dodajPizze'));

Route::post('/miejscowosc', array('as' => 'miejscowosc', 'uses' => 'PizzaController@miejscowosc'));
Route::post('/mieszkanie', array('as' => 'mieszkanie', 'uses' => 'PizzaController@mieszkanie'));
Route::post('/ulica', array('as' => 'ulica', 'uses' => 'PizzaController@ulica'));
Route::post('/email', array('as' => 'email', 'uses' => 'PizzaController@email'));
Route::post('/name', array('as' => 'name', 'uses' => 'PizzaController@name'));