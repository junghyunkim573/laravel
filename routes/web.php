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


Route::get('/','welcomecontroller@index');

Route::get('auth/login',function(){
	$credentials=[
		'email'=>'assakjh79@gmail.com',
		'password'=>'k124j248h!'
	];

	if(! auth()->attempt($credentials)){
		return '로그인 정보가 정확하지 않습니다.';
	}

	return redirect('protected');
});

Route::get('protected',['middleware'=>'auth',function(){
	
}]);

Route::get('auth/logout',function(){
	auth()->logout();

	return '또 뵈요~';

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles','articlescontroller');

/*
DB::listen(function($query){
	var_dump($query->sql);
});
*/
