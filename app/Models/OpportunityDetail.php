<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpportunityDetail extends Model
{
    protected $casts = [
      'start_date' => 'datetime',
      'end_date' => 'datetime',
    ];

    public function opportunity(){
        return $this->belongsTo(Opportunity::class);
    }
}
