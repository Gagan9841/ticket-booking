<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'category_id', 'show_id'];



    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function show(){
        return $this->hasMany(Show::class,'id','show_id');
    }

}
