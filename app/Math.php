<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Math extends Model
{
    public function sum($a, $b)
    {
        return $a + $b;
    }

    public function sub($a, $b)
    {
      return $a - $b;
    }
}
