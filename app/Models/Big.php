<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Big extends Model
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
