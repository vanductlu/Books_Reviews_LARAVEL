@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Edit Book
                    </div>
                    <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{csrf_field()}}
                            @method('PUT')

                            <div class="form-group">
                                <label for="Title"><strong>Title</strong></label>
                                <input type="text" class="form-control" id="Title" name="Title" value="{{ $book->Title }}">
                            </div>

                            <div class="form-group">
                                <label for="Author"><strong>Author</strong></label>
                                <input type="text" class="form-control" id="Author" name="Author" value="{{ $book->Author }}">
                            </div>

                            <div class="form-group">
                                <label for="Genre"><strong>Genre</strong></label>
                                <input type="text" class="form-control" id="Genre" name="Genre" value="{{ $book->Genre }}">
                            </div>

                            <div class="form-group">
                                <label for="Publication_Year"><strong>Publication Year</strong></label>
                                <input type="text" class="form-control" id="Publication_Year" name="Publication_Year" value="{{ $book->Publication_Year }}">
                            </div>

                            <div class="form-group">
                                <label for="ISBN"><strong>ISBN</strong></label>
                                <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ $book->ISBN }}">
                            </div>

                            <div class="form-group">
                                <label for="Cover_Image_URL"><strong>Cover Image</strong></label>
                                <p><strong>Image:</strong></p>
                                <img id="image-upload" src="{{asset('/storage/'. $book->Cover_Image_URL)}}" alt="Current Cover Image" style="max-height: 200px;">
                                <input type="file" accept="image/jpeg, image/png, image/svg, image/gif"  class="form-control-file" id="Cover_Image_URL" name="Cover_Image_URL">
                                <p class="fw-bold">accept: "image/jpeg, image/png, image/svg, image/gif"</p>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mt-1">Update</button>
                                <a href="{{ route('books.index') }}" class="btn btn-secondary mt-1">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection