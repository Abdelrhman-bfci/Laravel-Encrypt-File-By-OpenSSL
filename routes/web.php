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

Route::get('/', array( 
	'https' => true,
	'uses' =>function () {
    return view('encryptfile');
} ));

Route::post('/enFile','EncryptFileControllerr@GetFile')->name('enFile');
Route::any('/Save/{img?}','EncryptFileControllerr@Save')->name('save');
Route::get('/encode',function(){

	$data  = array('age' => 13 , 'name'=>'abdo' );

	$data1 = json_encode($data);

	dd( json_decode($data1));
});
