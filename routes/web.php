<?php

use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\EnregistrementController;
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

Route::get('/', [ConversationController::class, 'index'])->name('accueil')->middleware('auth');

Route::get('/enregistrement', [EnregistrementController::class, 'create'])->name('enregistrement');
Route::post('/enregistrement', [EnregistrementController::class, 'store']);

Route::get('/connexion', [ConnexionController::class, 'connexion'])->name('login');
Route::post('/connexion', [ConnexionController::class, 'authentifier']);

Route::get('/deconnexion', [ConnexionController::class, 'deconnecter']);

Route::post('/conversation/sauvegarder', [ConversationController::class, 'converser']);
