<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;
use App\Models\Book;
use App\Models\User;
use Faker\Generator as Faker;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        return [
            'book_id' => function () {
                return Book::inRandomOrder()->first()->id; //random 1 giá trị ngẫu nhiễn của cột book id 
            },
            'user_id' => function () {
                return User::inRandomOrder()->first()->id;//random 1 giá trị ngẫu nhiễn của cột user id 
            },
            'rating' => $faker->numberBetween(1, 5),
            'review_text' => $faker->paragraph,
            'review_date' => $faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}