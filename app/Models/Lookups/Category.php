<?php

namespace App\Models\Lookups;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $fillable = ['name'];
}
