<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderby('id','desc')->paginate(10); //sắp xếp theo trường 'id' theo thứ tự giảm dần và được phân trang với mỗi trang chứa tối đa 10 bản ghi
        return view('books.index', compact('books'));//Kết quả này được trả về cho một view có tên là 'books.index', với biến $books được truyền theo dạng compact.
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Title' => 'bail|required',
            'Author' => 'bail|required|string|not_regex:/[0-9]/',
            'Genre' => 'bail|required|string|not_regex:/[0-9]/',
            'Publication_Year' => 'bail|required|date_format:Y',
            'ISBN' => 'required|regex:/^\d{12}$/',
            'Cover_Image_URL' => 'bail|required|image', // Kiểm tra loại ảnh và kích thước tối đa là 2MB
        ]);
    
        $image = $request->file("Cover_Image_URL"); //Dòng này lấy tệp tin (file) được gửi lên với tên "Cover_Image_URL" từ yêu cầu.
    
        if ($image) { //nếu có tệp tin hình ảnh được gửi lên.
            $path = $image->storePublicly("images", "public");//hình ảnh sẽ được lưu trữ vào thư mục "images" với quyền truy cập công khai trong lưu trữ "public" 
        }
    
        $book = new Book;
        //các phương thức get được sử dụng để truy xuất dữ liệu từ đối tượng yêu cầu ($request). 
        //Mỗi lệnh get đều nhắm vào một trường cụ thể trong yêu cầu và trích xuất giá trị tương ứng
        $book->Title = $request->get("Title");
        $book->Author = $request->get("Author");
        $book->Genre = $request->get("Genre");
        $book->Publication_Year = $request->get("Publication_Year");
        $book->ISBN = $request->get("ISBN");
        $book->Cover_Image_URL = $path ?? null; //Trong trường hợp không có hình ảnh được tải lên, biến $path sẽ được gán giá trị mặc định là null.
    
        $book->save();
    
        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
{
    $validatedData = $request->validate([
        'Title' => 'bail|required',
        'Author' => 'bail|required|string|not_regex:/[0-9]/',
        'Genre' => 'bail|required|string|not_regex:/[0-9]/',
        'Publication_Year' => 'bail|required|date_format:Y',
        'ISBN' => 'required|regex:/^\d{12}$/',
        'Cover_Image_URL' => 'image|max:2048', // Kiểm tra loại ảnh và kích thước tối đa là 2MB
    ]);

    if ($request->hasFile('Cover_Image_URL')) { //Dòng này kiểm tra xem yêu cầu có chứa tệp tin được gửi lên với tên 'Cover_Image_URL' không
        $image = $request->file("Cover_Image_URL");//Dòng này lấy tệp tin được gửi lên với tên 'Cover_Image_URL' từ yêu cầu và gán cho biến $image.
        $path = $image->storePublicly("images", "public"); //Dòng này lưu trữ tệp tin hình ảnh vào thư mục "images" trong lưu trữ "public" của
        // trả về đường dẫn của tệp tin.
        $book->Cover_Image_URL = $path;
        //Đường dẫn của hình ảnh được gán cho thuộc tính 'Cover_Image_URL' của đối tượng sách để lưu trữ vào cơ sở dữ liệu
    }

    $book->Title = $request->get("Title");
    $book->Author = $request->get("Author");
    $book->Genre = $request->get("Genre");
    $book->Publication_Year = $request->get("Publication_Year");
    $book->ISBN = $request->get("ISBN");

    $book->save();

    return redirect()->route('books.index')
        ->with('success', 'Book updated successfully.');
}

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
}