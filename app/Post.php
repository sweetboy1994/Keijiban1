<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Polices\PostPolicy;
use App\User;


class Post extends Model
{
    protected $table ='posts';
}
function user(){
    return $this->belongsTo('App\User');
}
