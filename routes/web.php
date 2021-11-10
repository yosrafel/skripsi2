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

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => ['auth', 'checkRole:admin,inqa,kaprodi,dosen']], function()
{
    Route::get('/','DashboardController@home');
});

Route::group(['middleware' => ['auth', 'checkRole:admin']], function()
{    
    Route::get('/admin/list_dosen','DashboardController@listdsnAdm');
    Route::get('/admin/{id}/profiledsn','DashboardController@profiledsnAdm');

    Route::post('/admin/{id}/create_kelas', 'DashboardController@createKelasAdm');
    Route::get('/admin/{id}/{idkelas}/del_kelas','DashboardController@deleteKelasAdm');

    Route::post('/admin/{id}/create_pekerjaan', 'DashboardController@createPkjAdm');
    Route::get('/admin/{id}/detail_pekerjaan', 'DashboardController@detailPkjAdm');
    Route::put('/admin/{id}/update_pekerjaan', 'DashboardController@updatePkjAdm');
    Route::get('/admin/{id}/delete_pekerjaan','DashboardController@deletePkjAdm');
});

Route::group(['middleware' => ['auth', 'checkRole:kaprodi']], function()
{
    Route::get('/kaprodi/list_dosen','DashboardController@listdsnKp');
    Route::get('/kaprodi/{id}/profiledsn','DashboardController@profiledsnKp');
});

Route::group(['middleware' => ['auth', 'checkRole:dosen']], function()
{
    Route::put('/dosen/{id}/update_profil', 'DashboardController@updateProfilDsn');
    
    Route::post('/dosen/{id}/create_kelas', 'DashboardController@createKelasDsn');
    Route::get('/dosen/{id}/{idkelas}/del_kelas','DashboardController@deleteKelasDsn');

    Route::post('/dosen/{id}/create_pekerjaan', 'DashboardController@createPkjDsn');
    Route::get('/dosen/{id}/detail_pekerjaan', 'DashboardController@detailPkjDsn');
    Route::put('/dosen/{id}/update_pekerjaan', 'DashboardController@updatePkjDsn');
    Route::get('/dosen/{id}/delete_pekerjaan','DashboardController@deletePkjDsn');
});

Route::group(['middleware' => ['auth', 'checkRole:inqa']], function()
{
    Route::get('/inqa/{id}/profiledsn','DashboardController@profiledsnIn');
});

// Route::get('/servis/export', 'DashboardController@export');
// Route::post('/servis/import_excel', 'DashboardController@import_excel');
