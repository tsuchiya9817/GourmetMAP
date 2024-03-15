<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\Relation;
use App\Models\User;
use App\Restrant;


class Post extends Model
{

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    protected $table = 'posts';

    protected $fillable = ['restrant','message'];
 
    public function likes() {
        return $this->hasMany('App\Like');
    }

    public function follows() {
        return $this->hasMany('App\Follow');
    }

    public function restrants() {
        return $this->hasMany('App\Restrant','restrant');
    }

}
