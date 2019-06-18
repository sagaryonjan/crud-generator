<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sagar extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'status', 'description'
    ];

}
