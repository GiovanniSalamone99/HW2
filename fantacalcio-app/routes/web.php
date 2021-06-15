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

Route::get('/home', "HomeController@index")->name('home');
Route::get('/home/carica_news', "HomeController@caricaNews")->name('CARICA_NEWS');

Route::get('/news', "NewsController@index")->name('news');
Route::get('/news/fetch_news', "NewsController@caricaNews")->name('fetch_news');
Route::get('/news/fetch_commenti', "NewsController@caricaCommenti")->name('fetch_commenti');
Route::get('/news/add_commento/{commento}/{id_news}', "NewsController@addCommento")->name('add_commento');

Route::get('/highlights', "HighlightsController@index")->name('highlights');
Route::get('/highlights/add_pref/{titolo}/{img}/{url}', "HighlightsController@addPref")->name('add_pref');

Route::get('/podcast', "SpotifyController@index")->name('podcast');
Route::get('/podcast/carica_podcast', "SpotifyController@caricaPodcast")->name('carica_podcast');

Route::get('/squadra', "SquadraController@index")->name('squadra');
Route::get('/squadra/carica_squadre', "SquadraController@caricaSquadre")->name('carica_squadre');
Route::get('/squadra/get_lega/{q}', "SquadraController@getNomeLega")->name('get_lega');
Route::get('/squadra/add_squadra/{q}', "SquadraController@addSquadra")->name('add_squadra');
Route::get('/squadra/elimina_squadra/{q}', "SquadraController@eliminaSquadra")->name('elimina_squadra');

Route::get('/modifica_squadra', "Modifica_squadraController@index")->name('modifica_squadra');
Route::get('/modifica_squadra/fetch_giocatori/{q}', "Modifica_squadraController@fetchGiocatori")->name('fetch_giocatori');
Route::get('/modifica_squadra/fetch_giocatori_mancanti/{q}', "Modifica_squadraController@fetchGiocatoriMancanti")->name('fetch_giocatori_mancanti');
Route::get('/modifica_squadra/add_giocatore/{id_squadra}/{id_giocatore}', "Modifica_squadraController@addGiocatore")->name('add_giocatore');
Route::get('/modifica_squadra/elimina_giocatore/{id_squadra}/{id_giocatore}', "Modifica_squadraController@eliminaGiocatore")->name('elimina_giocatore');


Route::get('/leghe', "LegheController@index")->name('leghe');
Route::get('/leghe/carica_leghe', "LegheController@caricaLeghe")->name('carica_leghe');
Route::get('/leghe/fetch_squadre', "LegheController@fetchSquadre")->name('fetch_squadre');
Route::get('/leghe/fetch_squadre_iscritte/{id_lega}', "LegheController@fetchSquadreIscritte")->name('fetch_squadre_iscritte');
Route::get('/leghe/add_lega/{id_squadra}/{id_lega}', "LegheController@addLega")->name('add_lega');
Route::get('/leghe/elimina_iscrizione/{id_squadra}/{id_lega}', "LegheController@eliminaIscrizione")->name('elimina_iscrizione');


Route::get('/preferiti', "PreferitiController@index")->name('preferiti');
Route::get('/preferiti/carica_pref', "PreferitiController@caricaPreferiti")->name('carica_pref');
Route::get('/preferiti/elimina_pref/{id_pref}', "PreferitiController@eliminaPref")->name('elimina_pref');

Route::get('/login', "LoginController@login")->name('login');
Route::post('/login', "LoginController@checkLogin");
Route::get("/logout", "LoginController@logout")->name("logout");

Route::get('/iscrizione', "RegisterController@index")->name('register');
Route::post('/iscrizione', "RegisterController@create");
Route::get('/iscrizione/check_username/{username}', "RegisterController@checkUsername")->name('check_username');