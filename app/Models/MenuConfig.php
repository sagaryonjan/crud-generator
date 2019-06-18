<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuConfig extends Model
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
