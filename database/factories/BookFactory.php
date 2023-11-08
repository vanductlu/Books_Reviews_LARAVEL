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
            'Title' => $this->faker->sentence,//tạo 1 tiêu đề ngẫu nhiên
            'Author' => $this->faker->name,//tạo 1 tên tác giả
            'Genre' => $this->faker->word,//tạo ngẫu nhiên thể loại sách
            'Publication_Year' => $this->faker->year,//tạo 1 năm ngẫu nhiên
            'ISBN' => $this->faker->isbn13,//tạo 1 số ISBN 13 số
            'Cover_Image_URL' => $this->faker->imageUrl,//tạo 1 url ảnh ngẫu nhiên
        ];
    }
}
