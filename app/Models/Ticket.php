<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_no', 'user_id', 'movie_id', 'show_time', 'seat_no','total_price' ];

    public function movie(){
        return $this->belongsTo(Movie::class);
    }

    public function show(){
        return $this->belongsTo(Show::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
