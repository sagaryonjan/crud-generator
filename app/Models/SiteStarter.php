<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteStarter extends Model
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
