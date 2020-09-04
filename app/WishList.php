<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $fillable=[
        'id',
        'user_id',
        'title',
        'content'
    ];
    //
}