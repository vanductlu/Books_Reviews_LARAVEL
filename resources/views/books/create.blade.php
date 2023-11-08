@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>ADD NEW BOOK</h3>
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
                    <div class="d-flex">
                        <img id="image-upload" alt="Current Cover Image" style="height:350px;width:400px" class="me-3" width="200">
                        <div class="d-flex flex-column justify-content-center align-items-start w-100">
                            <div class="form-group w-100">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" id="Title" name="Title" value="{{ old('Title') }}">
                            </div>
                            <div class="form-group w-100">
                                <label for="Author">Author</label>
                                <input type="text" class="form-control" id="Author" name="Author" value="{{ old('Author') }}">
                            </div>
                            <div class="form-group w-100">
                                <label for="Genre">Genre</label>
                                <input type="text" class="form-control" id="Genre" name="Genre" value="{{ old('Genre') }}">
                            </div>
                            <div class="form-group w-100">
                                <label for="Publication_Year">Publication Year</label>
                                <input type="number" class="form-control" id="Publication_Year" name="Publication_Year" value="{{ old('Publication_Year') }}">
                            </div>
                            <div class="form-group w-100">
                                <label for="ISBN">ISBN</label>
                                <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ old('ISBN') }}">
                            </div>
                            <div class="form-group w-100">
                                <label for="Cover_Image_URL">Cover Image:</label>
                                <input type="file" class="form-control form-control-sm" id="Cover_Image_URL" name="Cover_Image_URL">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">ADD</button>
                        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection