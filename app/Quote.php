<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    public function offer()
    {
        return $this->belongsTo('App\Quote');
    }
}
