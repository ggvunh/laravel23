<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cat;

class Breed extends Model
{
    protected $fillable = ['name'];

    public function cats()
    {
        return $this->hasMany('Cat');
    }
}
