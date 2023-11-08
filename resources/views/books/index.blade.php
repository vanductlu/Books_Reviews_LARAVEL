@extends('layouts.app')

@section('content')
    <h1>Books</h1>
    <div class="mt-4">
        <a href="{{ route('books.create') }}" class="btn btn-success">ADD NEW</a>
    </div>
    <div class="table-responsive"> <!-- Bổ sung lớp CSS "table-responsive" để làm cho bảng tự động cuộn -->
        <table class="table table-bordered align-middle">
            <thead>
                <tr class="text-center">
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Publication Year</th>
                    <th>ISBN</th>
                    <th>Cover Image</th>
                    <th>Cover Image URL</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr class="text-center">
                        <td>{{ $book->Title }}</td>
                        <td>{{ $book->Author }}</td>
                        <td>{{ $book->Genre }}</td>
                        <td>{{ $book->Publication_Year }}</td>
                        <td>{{ $book->ISBN }}</td>
                        <td>  
                                <img class="img-fluid" src="{{asset('/storage/'. $book->Cover_Image_URL)}}" style="max-height: 100px;max-width: 120px;"onerror="handleImageError(this)">         
                        </td>
                        <td>{{ $book-> Cover_Image_URL}}</td>
                        <td class="d-flex justify-content-center align-items-center py-3">
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary mx-1">Show <i class="bi bi-eye"></i></a>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning mx-1">Edit <i class="bi bi-pencil-fill"></i></a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Are you sure you want to delete this book?')">Delete <i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $books->links() }}
    </div>
    <script>
function handleImageError(image) {
  image.onerror = null; // Ngăn chặn việc gọi lại nếu xảy ra lỗi lần thứ hai
  image.src = "{{ asset('/img/error.png')}}";
}
</script>
@endsection