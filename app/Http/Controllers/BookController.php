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
            'Title' => 'required',
            'Author' => 'required',
            'Genre' => 'required',
            'Publication_Year' => 'required',
            'ISBN' => 'required',
            'Cover_Image_URL' => 'nullable',
        ]);
        
        $image = $request->file("Cover_Image_URL");
    
        $path = $image->storePublicly("images", "public");
        
        $book = new Book;
        $book->Title = $request->get("Title");
        $book->Author = $request->get("Author");
        $book->Genre = $request->get("Genre");
        $book->Publication_Year = $request->get("Publication_Year");
        $book->ISBN = $request->get("ISBN");
        $book->Cover_Image_URL =    $path;

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
            'Title' => 'required',
            'Author' => 'required',
            'Genre' => 'required',
            'Publication_Year' => 'required',
            'ISBN' => 'required',
            'Cover_Image_URL' => 'required|image',
        ]);
        
        $image = $request->file("Cover_Image_URL");
        $content = $image->getContent();
        if(Storage::disk("public")->exists($book->Cover_Image_URL)){
            Storage::disk("public")->put($book->Cover_Image_URL, $content);
        }
        else{
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