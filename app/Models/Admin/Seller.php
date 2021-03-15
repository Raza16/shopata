<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Seller extends Model
{
    use HasFactory;

    public function user()
    {
      
            return $this->belongsTo(User::class);
        
    }
}
