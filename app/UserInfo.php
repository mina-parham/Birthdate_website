<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    //
    protected $fillable=[
        'id',
        'username',
        'firstName',
        'lastName',
        'birthdate',
        'photo',
        'phoneNumber',
        'email'
    ];


    protected $table='user_info';
}
