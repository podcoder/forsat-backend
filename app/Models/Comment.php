<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment','question_id', 'created_by'];

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }
}
