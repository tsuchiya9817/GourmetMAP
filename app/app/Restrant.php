<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Restrant extends Model
{
    public function post() {
        return $this->belongsTo('App\Post','restrant');
    }

    public $timestamps = false;
}
