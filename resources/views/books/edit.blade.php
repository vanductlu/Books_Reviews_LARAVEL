@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Information Book</h3>
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
                        {{ csrf_field() }}
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p>Image:</p>
                                    <img id="image-upload" src="{{ asset('/storage/'. $book->Cover_Image_URL) }}" alt="Current Cover Image" style="height:350px;width:400px">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Title">Title</label>
                                    <input type="text" class="form-control" id="Title" name="Title" value="{{ $book->Title }}">
                                </div>

                                <div class="form-group">
                                    <label for="Author">Author</label>
                                    <input type="text" class="form-control" id="Author" name="Author" value="{{ $book->Author }}">
                                </div>

                                <div class="form-group">
                                    <label for="Genre">Genre</label>
                                    <input type="text" class="form-control" id="Genre" name="Genre" value="{{ $book->Genre }}">
                                </div>

                                <div class="form-group">
                                    <label for="Publication_Year">Publication Year</label>
                                    <input type="text" class="form-control" id="Publication_Year" name="Publication_Year" value="{{ $book->Publication_Year }}">
                                </div>

                                <div class="form-group">
                                    <label for="ISBN">ISBN</label>
                                    <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ $book->ISBN }}">
                                </div>
                                <div class="form-group">
                                    <label for="Cover_Image_URL">Cover Image</label>
                                    <br>
                                    <input type="file" accept="image/jpeg, image/png, image/svg, image/gif" class="form-control-file" id="Cover_Image_URL" name="Cover_Image_URL">
                                </div>

                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection