<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Cat extends Model
{
    use SoftDeletes;
    // protected $table = 'cats';
    protected $fillable = ['name', 'date_of_birth', 'breed_id', 'user_id'];
    protected $dates = ['deleted_at'];

    public function breed()
    {
        return $this->belongsTo('App\Breed', 'breed_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function canEdit()
    {
        $currentUser = Auth::user();
        if ($currentUser->is_admin || ($this->user_id == $currentUser->id)) {
            return true;
        }
        return false;
    }
}
