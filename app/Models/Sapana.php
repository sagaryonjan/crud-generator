<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sapana extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'status', 'about_you'
    ];

}
