<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function call()
    {
        return $this->belongsTo(calls::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
