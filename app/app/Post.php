<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    protected $table = 'posts';

    protected $fillable = ['restrant','message'];

}
