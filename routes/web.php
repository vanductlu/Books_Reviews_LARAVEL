<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource('books', BookController::class);//tạo tất cả các tuyến đường RESTful cơ bản cho tài nguyên sách
// GET /books: Hiển thị danh sách tất cả sách.
// GET /books/create: Hiển thị giao diện tạo sách mới.
// POST /books: Lưu trữ sách mới vào cơ sở dữ liệu.
// GET /books/{book}: Hiển thị thông tin chi tiết về một cuốn sách cụ thể.
// GET /books/{book}/edit: Hiển thị giao diện chỉnh sửa cho một cuốn sách cụ thể.
// PUT /books/{book} hoặc PATCH /books/{book}: Cập nhật thông tin cho một cuốn sách cụ thể.
// DELETE /books/{book}: Xóa một cuốn sách cụ thể khỏi cơ sở dữ liệu.