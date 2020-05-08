<?php

namespace App\Models\Lookups;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'phone_code', 'country_code'];
}
