<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    //
    use Softdeletes;

    public function blogs()
    {
        return $this->belongsToMany('App\Blog');
    }
}
