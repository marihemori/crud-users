<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'birthdate'
    ];

    //protected $guarded = ['admin'];

    public $rules = [
        'name'      => 'required',
        'email'     => 'required',
        'password'  => 'required|min:8|max:255',
        'birthday'  => 'min:10|max:10',

    ];
}
