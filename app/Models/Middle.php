<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Middle extends Model
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
