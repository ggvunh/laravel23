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
    return redirect('/cats');
});

Route::get('/cats/{id}', function($id){
    echo $id;
});

Route::get('/cats', function(){
    return 'All cats';
});

Route::get('/about', function(){
    $numberCat = 100;
    $name = 'Tom';
    return view('about', compact(['numberCat', 'name']));
});
