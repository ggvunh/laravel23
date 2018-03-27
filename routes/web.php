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
use App\Cat;
use App\Breed;

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

Route::get('/cats/{id}', function($id){

  $cat = Cat::findOrFail($id);
  return view('cats.show', compact('cat'));
});

Route::get('/cats', function(){
  $cats = Cat::with('breed')->get();
  return view('cats.index', compact('cats'));
});

Route::get('cats/breeds/{name}', function($name){
  $breed = Breed::with('cats')
    ->where('name', $name)->first();
  $cats = $breed->cats;

  return view('cats.index', compact('breed', 'cats'));
});
