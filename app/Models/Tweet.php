<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tweet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tweet',  
        'userId',      
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
