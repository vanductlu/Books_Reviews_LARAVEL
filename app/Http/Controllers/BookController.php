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
        $books = Book::orderby('id','desc')->simplepaginate(10); //phân trang liên kết với 2 button ngắn gọn hơn paginate;
        return view('books.index', compact('books'));
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
    
        $image = $request->file("Cover_Image_URL");
    
        if ($image) {
            $path = $image->storePublicly("images", "public");
        }
    
        $book = new Book;
        $book->Title = $request->get("Title");
        $book->Author = $request->get("Author");
        $book->Genre = $request->get("Genre");
        $book->Publication_Year = $request->get("Publication_Year");
        $book->ISBN = $request->get("ISBN");
        $book->Cover_Image_URL = $path ?? null;
    
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

    if ($request->hasFile('Cover_Image_URL')) {
        $image = $request->file("Cover_Image_URL");
        $path = $image->storePublicly("images", "public");
        $book->Cover_Image_URL = $path;
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