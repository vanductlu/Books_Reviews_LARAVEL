<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';

    protected $fillable = [
        'Title',
        'Author',
        'Genre',
        'Publication_Year',
        'ISBN',
        'Cover_Image_URL',
    ];
}
