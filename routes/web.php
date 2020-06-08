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


Route::get('/', [
	'as'=>'kim',
	function () {
    return '제이름은 "kim" 입니다';
}
]);

Route::get('/kim',function(){
	return redirect(route('kim'));
});
