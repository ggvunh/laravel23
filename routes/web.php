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
use Illuminate\Support\Facades\Input;

Route::get('/', 'CatController@home');
Route::get('/about', 'CatController@about');
// create
Route::get('cats/create', 'CatController@create');

Route::post('/cats', function(){
  $data = Input::all();
  $cat = Cat::create($data);
  return redirect('/cats');
});

// update
Route::get('cats/{id}/update', function($id){
  $cat = Cat::findOrFail($id);
  // $breeds = Breed::all()->pluck('name', 'id');
  return view('cats.update', compact('cat'));
});

Route::put('cats/{id}', function($id){
  $cat = Cat::findOrFail($id);
  $data = Input::all();
  $cat->update($data);
  return redirect('cats/' . $cat->id);
});

// delete
Route::get('cats/{id}/delete', function($id){
  $cat = Cat::findOrFail($id);
  $cat->delete();
  return redirect('/cats');
});

// Route::get('/cats/{cat}', function(Cat $cat){
//   // $cat = Cat::findOrFail($id);
//   return view('cats.show', compact('cat'));
// });

Route::get('/cats/{id}', function($id){
  $cat = Cat::findOrFail($id);
  return view('cats.show', compact('cat'));
});

Route::get('/cats', function(){
  $cats = Cat::with('breed')->get();
  return view('cats.index', compact('cats'));
});

Route::get('cats/breeds/{name}', function($name){
  $breed = Breed::where('name', '=', $name)->first();
  $cats = $breed->cats;
  return view('cats.index', compact('breed', 'cats'));
});

Route::resource('photos', 'PhotoController');
