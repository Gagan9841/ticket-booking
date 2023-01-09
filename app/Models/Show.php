<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $fillable = ['show_time'];

    public function movie(){
        return $this->belongsToMany(Movie::class);
    }

    public function ticket(){
        return $this->hasMany(Ticket::class);
    }
}
