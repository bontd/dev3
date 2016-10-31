<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Auth extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'facebook_id', 'avatar'];

}