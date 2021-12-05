<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/tm', function(){
    return redirect(asset('/hasiltm.pdf'));
    
});

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index']);

Route::get('/lomba/{slug}', [App\Http\Controllers\CompetitionTypeController::class, 'show'])->name('competition.detail');
Route::get('/peserta', [App\Http\Controllers\CompetitorController::class, 'index'])->name('competitior.index');
Route::get('/zoom', [App\Http\Controllers\CompetitorController::class, 'zoom'])->name('zoom');
Route::get('/panduan', [App\Http\Controllers\PanduanController::class, 'index'])->name('panduan.index');
Route::group(['middleware' => 'auth'], function () {   
    Route::post('/qa', [App\Http\Controllers\QAController::class, 'store'])->name('qa.store');
});
Route::get('/qa', [App\Http\Controllers\QAController::class, 'index'])->name('qa.index');

Route::prefix('api')->name('api.')->namespace('App\Http\Controllers\Api')->group(static function() {
    Route::get('/pesertaLomba', 'MainController@pesertaLomba')->name('pesertaLomba');
});

Auth::routes();

Route::group(['middleware' => ['activity']], function () {   
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::group(['middleware' => ['auth','activity']], function () {    
    Route::namespace('App\Http\Controllers')->group(static function() {
        Route::resource('/account', 'AccountController', ['name'=>'account']);
        Route::resource('/message', 'MessageController', ['name'=>'message']);
    });
    
    Route::prefix('admin')->middleware('admin')->name('admin.')->namespace('App\Http\Controllers\Admin')->group(static function() {
        Route::get('/tiket', 'CompetitorController@tiket')->name('tiket');
        Route::get('/dashboard', 'IndexController@index')->name('index');
        Route::resource('/sponsor', 'SponsorController', ['name'=>'sponsor']);
        Route::resource('/competition', 'CompetitionController', ['name'=>'competition']);
        Route::resource('/competitionType', 'CompetitionTypeController', ['name'=>'competitionType']);
        Route::resource('/paymentMethod', 'RekeningController', ['name'=>'paymentMethod']);
        Route::resource('/user', 'UserController', ['name'=>'user']);
        Route::resource('/question', 'QuestionController', ['name'=>'question']);
        Route::get('/imgDelete/{id}', 'SponsorController@imgDelete')->name('sponsor.imgDelete');
        Route::get('payment/{id}/decline', 'PaymentController@decline')->name('payment.decline');
        Route::get('payment/{id}/receive', 'PaymentController@receive')->name('payment.receive');
        Route::resource('/payment', 'PaymentController', ['name'=>'payment']);
        Route::resource('/upload', 'UploadController', ['name'=>'upload']);
        Route::get('/competitor/upload/{id}', 'CompetitorController@competitorUpload')->name('competitor.upload');
       
        Route::resource('/competitor', 'CompetitorController', ['name'=>'competitor']);
        Route::resource('/panduan', 'PanduanController', ['name'=>'panduan']);
    });

    Route::prefix('app')->name('app.')->namespace('App\Http\Controllers\App')->group(static function() {
        Route::post('/competitor/detail/{id}/update', 'CompetitorController@detailUpdate')->name('competitor.detail.update');
        Route::post('/competitor/create/team', 'CompetitorController@createTeamStore')->name('competitor.createTeam.store');
        Route::get('/competitor/create/team', 'CompetitorController@createTeam')->name('competitor.createTeam');
        Route::post('/competitor/{id}/chooseSong', 'CompetitorController@chooseSong')->name('competitor.chooseSong');
        Route::get('/competitor/{id}/chooseSurah', 'CompetitorController@chooseSurah')->name('competitor.chooseSurah');
        Route::resource('/competitor', 'CompetitorController', ['name'=>'competitor']);
        Route::resource('/upload', 'UploadController', ['name'=>'upload']);
        Route::resource('/payment', 'PaymentController', ['name'=>'payment']);
        Route::resource('/guide', 'GuideController', ['name'=>'guide']);
    });
});