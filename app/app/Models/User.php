<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relations
     public function registration(): \Illuminate\Database\Eloquent\Relations\HasOne
     {
        return $this->hasOne(Registration::class);
     }
}
