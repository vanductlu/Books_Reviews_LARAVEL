<?php

namespace Database\Factories;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => $this->faker->sentence,
            'Author' => $this->faker->name,
            'Genre' => $this->faker->word,
            'Publication_Year' => $this->faker->year,
            'ISBN' => $this->faker->isbn13,
            'Cover_Image_URL' => $this->faker->imageUrl,
        ];
    }
}
