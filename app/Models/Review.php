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
        return $this->belongsTo(Book::class); //xác định mối quan hệ "một-nhiều" (many-to-one) giữa mô hình hiện tại và mô hình Book. Điều này đề cập đến việc một đánh giá (review) thuộc về một cuốn sách cụ thể.
    }

    public function user()
    {
        return $this->belongsTo(User::class); //xác định mối quan hệ "một-nhiều" (many-to-one) giữa mô hình hiện tại và mô hình User
    }

    protected static function boot() // được ghi đè để định nghĩa hành vi xóa liên quan
    {
        parent::boot();

        // Sử dụng sự kiện "deleting" để xử lý việc xóa các bản ghi liên quan trong bảng 'books'
        static::deleting(function ($review) {
            $review->book()->delete();
        });
    }
}