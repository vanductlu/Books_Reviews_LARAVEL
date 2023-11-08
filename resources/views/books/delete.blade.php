@extends('layouts.app')

@section('content')
    <!-- Nút edit -->
    <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">Edit</a>

    <!-- Nút xóa (modal xác nhận) -->
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $book->id }}">
        Delete
    </button>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal-{{ $book->id }}">
        <div class="modal-dialog">
            <form action="{{ route('books.destroy', $book) }}" method="POST">
                @csrf
                @method('DELETE')
                
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this book?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection