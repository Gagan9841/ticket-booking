<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Show;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name();
        $desc = fake()->sentence();
        $img = fake()->name();
        $cat_id = function(){
            return Category::factory()->create()->id;
        };
        $show_id = function () {
            return Show::factory()->create()->id;
        };
        $status = fake()->name();

        return [
            'name'=>$name,
            'description'=>$desc,
            'slug' => Str::slug($name),
            'category_id'=>$cat_id,
            'show_id'=>$show_id,
            'movie_img'=> $img,
            'status'=>$status,
        ];
    }
}
