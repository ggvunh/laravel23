<?php

namespace App\Http\Controllers;
use App\Cat;
use App\Breed;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\CreateCatRequest;
use Auth;

use Illuminate\Http\Request;

class CatController extends Controller
{
    public function home()
    {
        return redirect('/cats');
    }

    public function about()
    {
        $numberCat = 100;
        $name = 'Tom';
        return view('about', compact(['numberCat', 'name']));
    }

    public function create()
    {
        // $breeds = Breed::all()->pluck('name', 'id');
        return view('cats.create');
    }

    public function save(CreateCatRequest $request)
    {
        $data = $request->all();
        $user_id = Auth::id();
        $data['user_id'] = $user_id;
        $cat = Cat::create($data);
        return redirect('/cats');
    }
}
