<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_no', 'user_id', 'movie_id', 'show_time', 'seat_no' ];

    public function movie(){
        return $this->belongsTo(Movie::class,'movie_id','id');
    }

}
