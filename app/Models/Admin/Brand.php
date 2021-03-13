<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class Brand extends Model
{
    use HasFactory , Notifiable ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
      
            return $this->hasMany(Product::class);
        
    }
}
