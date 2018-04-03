<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use SoftDeletes;
    // protected $table = 'cats';
    protected $fillable = ['name', 'date_of_birth', 'breed_id'];
    protected $dates = ['deleted_at'];

    public function breed()
    {
        return $this->belongsTo('App\Breed', 'breed_id', 'id');
    }
}
