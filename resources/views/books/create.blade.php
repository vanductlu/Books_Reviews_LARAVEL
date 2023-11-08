@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Create Book</h1>
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

                <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="Title">Title</label>
                        <input type="text" class="form-control" id="Title" name="Title" value="{{ old('Title') }}">
                    </div>

                    <div class="form-group">
                        <label for="Author">Author</label>
                        <input type="text" class="form-control" id="Author" name="Author" value="{{ old('Author') }}">
                    </div>

                    <div class="form-group">
                        <label for="Genre">Genre</label>
                        <input type="text" class="form-control" id="Genre" name="Genre" value="{{ old('Genre') }}">
                    </div>

                    <div class="form-group">
                        <label for="Publication_Year">Publication Year</label>
                        <input type="number" class="form-control" id="Publication_Year" name="Publication_Year" value="{{ old('Publication_Year') }}">
                    </div>

                    <div class="form-group">
                        <label for="ISBN">ISBN</label>
                        <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ old('ISBN') }}">
                    </div>

                    <div class="form-group">
                        <label for="Cover_Image_URL">Image:</label>
                        <img id="image-upload" alt="Current Cover Image" style="max-height: 200px;">
                        <input accept="image/jpeg, image/png, image/svg, image/gif" type="file" class="form-control" id="Cover_Image_URL" name="Cover_Image_URL">
                        <p class="fw-bold">accept:"image/jpeg, image/png, image/svg, image/gif"</p>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mt-1">Create</button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary mt-1">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection