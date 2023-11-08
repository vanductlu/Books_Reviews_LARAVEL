<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Review extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'user_id', 'rating', 'review_text', 'review_date'];

    // (Tuỳ chọn) Ghi đè phương thức getTable() nếu sử dụng tên bảng khác
    // public function getTable()
    // {
    //     return 'my_reviews';
    // }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        // Sử dụng sự kiện "deleting" để xử lý việc xóa các bản ghi liên quan trong bảng 'books'
        static::deleting(function ($review) {
            $review->book()->delete();
        });
    }
}