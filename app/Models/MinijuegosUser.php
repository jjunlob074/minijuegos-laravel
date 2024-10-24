<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinijuegosUser extends Model
{
    use HasFactory;
    protected $table = 'minijuego_user';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
