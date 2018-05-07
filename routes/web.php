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

Route::get('/service-container/one', 'ServiceContainerSampleController@one');
Route::get('/service-container/two', 'ServiceContainerSampleController@two');
Route::get('/service-container/three', 'ServiceContainerSampleController@three');
Route::get('/service-container/four', 'ServiceContainerSampleController@four');
Route::get('/service-container/five', 'ServiceContainerSampleController@five');
Route::get('/service-container/six', 'ServiceContainerSampleController@six');
Route::get('/service-container/seven', 'ServiceContainerSampleController@seven');
Route::get('/service-container/eight', 'ServiceContainerSampleController@eight');
Route::get('/service-container/nine', 'ServiceContainerSampleController@nine');
Route::get('/service-container/ten', 'ServiceContainerSampleController@ten');
Route::get('/service-container/eleven', 'ServiceContainerSampleController@eleven');
Route::get('/service-container/twelve', 'ServiceContainerSampleController@twelve');

Route::get('middleware', function() {
    echo "middleware route<br/>";
})->middleware('middleware-sample');

Route::get('single-action-controller', 'SingleActionController');