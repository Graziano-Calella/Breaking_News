<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'provider',
        'provider_id',
        'provider_token',
        'is_admin',
        'is_revisor',
        'is_writer',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
