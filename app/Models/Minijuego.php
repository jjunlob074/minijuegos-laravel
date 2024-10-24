<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minijuego extends Model
{
    use HasFactory;
    protected $table = 'minijuegos'; 
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
