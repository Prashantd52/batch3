<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    //
    use Softdeletes;

    public function categories()
    {
        return $this->belongsTo('App\Category','category_id','id');
    }
}
